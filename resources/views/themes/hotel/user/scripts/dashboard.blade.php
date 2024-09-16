<script type="text/javascript">
    "use strict";

    var sponser             =   null;
    let userAccount         =   '';
    const web3              =   new Web3(window.ethereum);

    const tokenAddress      =   '{{$contract->tokenAddress}}';
    const tokenABI          =   @json($contract->tokenABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const contractAddress   =   '{{$contract->contractAddress}}';
    const contractABI       =   @json($contract->contractABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const networkId         =   '{{$contract->networkId}}';

    function detectMetaMask() {
        if(typeof window.ethereum !== 'undefined') {
            return true;
        }
        else{
            return false;
        }
    }

    detectAccount();
    function detectAccount() {
        if(detectMetaMask()){
            ethereum.request({ method: 'eth_accounts' }).then((accounts) => {
                if(accounts.length > 0){
                    userAccount = accounts[0];
                    userAccount = "{{Auth::user()->wallet_address}}"
                    @if(request()->routeIs('user.dashboard'))
                        getAccount(userAccount);
                    @endif
                    
                }
            });
        }else{
            Notiflix.Notify.Failure('Wallet Extension not detected');
        }
    }
    
    const getAccount = async (walletAddress) => {
        try {
            // walletAddress = walletAddress ?? userAccount;
            console.log(walletAddress);
            const chainId 			=	await window.ethereum.request({"method": "eth_chainId", "params": []});            
            if(chainId == networkId){   
                const bussinessContract =   new web3.eth.Contract(contractABI, contractAddress);
                const getUserDetails    =   await bussinessContract.methods.users(walletAddress).call();
                console.log(getUserDetails);
                const tokenContract     =   new web3.eth.Contract(tokenABI, tokenAddress);
                const tokenBalance		=   await tokenContract.methods.balanceOf(walletAddress).call();
                const tokenBal          =	amountFormat(tokenBalance);
                if(getUserDetails.id >= 0){  
                    const directIncome      =   amountFormat(getUserDetails.incomeDirect)
                    const globalIncome      =   amountFormat(getUserDetails.incomeGlobalAutoPool)
                    const levelIncome       =   amountFormat(getUserDetails.incomeLevel)
                    const teamLevel         =   amountFormat(getUserDetails.incomeTeamLevel)
                    const totalIncome       =   directIncome + globalIncome + levelIncome + teamLevel;
                    const wallet1           =   amountFormat(getUserDetails.wallet1);
                    const wallet2           =   amountFormat(getUserDetails.wallet2);
                    
                    $('#direct-income').html('$ '+directIncome.toFixed(4));
                    $('#global-income').html('$ '+globalIncome.toFixed(4));
                    $('#level-income').html('$ '+levelIncome.toFixed(4));
                    $('#level-buy-income').html('$ '+teamLevel.toFixed(4));
                    $('#total-income').html('$ '+totalIncome.toFixed(4));
                    $('#user_balance').html(tokenBal.toFixed(4));
                    $('#wallet1-income').attr('data-wallet', wallet1.toFixed(4));
                    $('.wallet1-income').html('$ '+wallet1.toFixed(4));

                    $('.wallet2-income').attr('data-wallet', wallet2.toFixed(4));
                    $('.wallet2-income').html('$ '+wallet2.toFixed(4));

                    $('#total-income').html('$ '+totalIncome.toFixed(4));
                   
                }
            }else{
                ethereum.request({ method: 'wallet_switchEthereumChain', params:[{chainId: networkId}]}).then((result) => {
                    if(result == null){
                        getAccount(walletAddress);
                    }
                })
            }   
        }
        catch (err) {
            Notiflix.Notify.Failure(err.message);
            console.log(err);
        }
    }
    const checkTxnHash = async (txnHash) => {    
       const response =  await web3.eth.getTransactionReceipt(txnHash, function(error, result){
            if(error){
                return false;
            }
          
        });
        return response;
    }

    const arroveToken = async (packId, packAmount) => {
        try {
            showLoader();
            const tokenContract     =   new web3.eth.Contract(tokenABI, tokenAddress);
            const amount            =   '0x' + (packAmount * 1000000000000000000).toString(16);            
            const transfer          =   await tokenContract.methods.approve(contractAddress, amount);            
            const encodedABI        =   await transfer.encodeABI();
            const chainId 			=	await window.ethereum.request({"method": "eth_chainId", "params": []});
            if(chainId == networkId){                
                const gasEstimate 		=	await transfer.estimateGas({ from: userAccount });
                const getBNB 			=	await window.ethereum.request({method: 'eth_getBalance', params: [userAccount, "latest"]});
                const balBNB			=	web3.utils.fromWei(getBNB, 'ether');
                const balGas			=	parseFloat(gasEstimate/10000000);
                
                if(balBNB > balGas){
                    const txHash = await window.ethereum.request({
                        method: 'eth_sendTransaction',
                        params: [
                            {
                                from: userAccount,
                                to: tokenAddress,
                                data: encodedABI,
                            },
                        ],
                    });
                    
                    if(txHash){
                        setTimeout(async function(){
                            try{
                                const bussinessContract =   new web3.eth.Contract(contractABI, contractAddress);
                                const getRegister       =   await bussinessContract.methods.buyTopUp();
                                const getRegisterABI    =   await getRegister.encodeABI();
                                
                                const txHash = await window.ethereum.request({
                                    method: 'eth_sendTransaction',
                                    params: [
                                        {
                                            from: userAccount,
                                            to: contractAddress,
                                            data: getRegisterABI,
                                        },
                                    ],
                                });

                                let checkTxn = await new Promise(resolve => {
                                    setTimeout(async () => {
                                        const txReceipt = await checkTxnHash(txHash);
                                        console.log(txReceipt);
                                        resolve(txReceipt);
                                        // alert('Receipt ');
                                    }, 5000);
                                });
                                

                                if(checkTxn.status == true) {

                                    $.ajax({
                                        url: "{{route('user.buy-package-submit')}}",
                                        type: "POST",
                                        data: {
                                            package_id: packId,
                                            _token: "{{ csrf_token() }}",
                                            txHash: txHash
                                        },
                                        success: function (response) {
                                            if(response.status == 200){
                                                hideLoader();
                                                Notiflix.Notify.Success(response.message, "Success!");
                                                localStorage.setItem('insert_in_matrix', 1);
                                                setTimeout(async function(){
                                                    window.location.href = "{{ route('user.dashboard') }}";
                                                }, 2000);
                                            }else{
                                                Notiflix.Notify.Failure(response.message, "Opps!");
                                            }
                                        },
                                        error: function (status, error) {
                                            var errors = JSON.parse(status.responseText);
                                            var msg_error = "";
                                            hideLoader();
                                            if (errors.status == 422) {
                                                $("#form").find("button").attr("disabled", false);
                                                $("#form").find("button>i").hide();
                                                if (typeof errors.error == "object") {
                                                $.each(errors.error, function (i, v) {
                                                    msg_error += v[0] + "!</br>";
                                                });
                                                } else {
                                                msg_error = errors.error;
                                                }
                                                Notiflix.Notify.Failure(msg_error, "Opps!");
                                            } else {
                                                Notiflix.Notify.Failure(errors.message, "Opps!");
                                            }
                                        },
                                        compelete: function () {
                                            hideLoader();
                                        }
                                    });
                                }
                                else{
                                    hideLoader();
                                    Notiflix.Notify.Failure('You have cancelled the transaction');
                                }
                            }
                            catch(e){
                                hideLoader();
                                Notiflix.Notify.Failure(e.message, "Opps!");
                            }
                        }, 10000);
                    }
                    else{
                        hideLoader();
                        Notiflix.Notify.Failure('You have cancelled the transaction');
                    }
                }
                else{
                    hideLoader();
                    Notiflix.Notify.Failure('You do not have sufficient BNB to register');
                }
            }
            else {
                ethereum.request({ method: 'wallet_switchEthereumChain', params:[{chainId: networkId}]}).then((result) => {
                    if(result == null){
                        arroveToken(packId, packAmount);
                    }
                })
                .catch(
                    (error) => {
                        hideLoader();
                        Notiflix.Notify.Failure(error.message)}
                );
            }
        }
        catch (err) {
            hideLoader();
            Notiflix.Notify.Failure(err.message);
        }
    }

    async function addUserInSolt(slotId) {
        try {
            const bussinessContract = new web3.eth.Contract(contractABI, contractAddress);
            const getSoltLength = await bussinessContract.methods.getSoltMember(slotId).call();
            const userId = parseInt(getSoltLength) - 1;
            const getUser = await bussinessContract.methods.globalMatrix(slotId, userId).call();

            const response = await $.post("{{route('user.add-user-matrix')}}", {
                slot_id: slotId,
                user_id: getUser.id,
                wallet_id: getUser.walletId,
                parent_id: getUser.parentId,
                downline: getUser.downline,
                _token: "{{ csrf_token() }}",
            });

            if (response.status === 200) {
                return true;
            }else{
                return false;
            }

        } catch (err) {
            console.error(err);
            return false;
        }
    }
   
</script>