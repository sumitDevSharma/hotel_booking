
<script>
    var sponser             =   null;
    let userAccount         =   '';
    let tokenBal = 0;
    let balBNB = 0;
    let walletProvider      =   null;
    const web3              =   new Web3(window.ethereum);
    const tokenAddress      =   '{{$contract->tokenAddress}}';
    const tokenABI          =   @json($contract->tokenABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const contractAddress   =   '{{$contract->contractAddress}}';
    const contractABI       =   @json($contract->contractABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const networkId         =   '{{$contract->networkId}}';
    const contract          =   new web3.eth.Contract(contractABI, contractAddress);
    function detectMetaMask() {
        if(typeof window.ethereum !== 'undefined') {
            return true;
        }
        else{
            return false;
        }
    }

    const register = async (walletAddress) => {
        try{
            const exampleMessage    = 'Signup in One Million Earn For '+ walletAddress;
            const from              =	walletAddress;
            const encoder           =	new TextEncoder();
            const uint8Array        =	encoder.encode(exampleMessage);
            const hexString         =	Array.from(uint8Array, byte => byte.toString(16).padStart(2, '0')).join('');
            const msg               =	`0x${hexString}`;
            const signature         =	await window.ethereum.request({ method: 'personal_sign', params: [msg, from, 'Example password']});
            const postData          =   {
                                            wallet_address: walletAddress,
                                            signature: signature,
                                            _token: "{{ csrf_token() }}",
                                            sponsor: sponser ? sponser : null
                                        };
            checkIsRegistered(walletAddress, sponser, postData);        
        }
        catch(e){
            hideLoader();
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
      
    }

    const checkIsRegistered = async (walletAddress, refAddress, postData) => {        
        $.ajax({
            url: "{{ route('checkIsRegistered') }}",
            type: "POST",
            data: {
                wallet_address: walletAddress,
                ref_address: refAddress,
                _token: "{{ csrf_token() }}",
            },
            async: false,
            success: function (response) {
                if(response.status == 200){
                    arroveToken(postData);                                   
                    return true;
                }
                else{
                    return false;
                }
            },
            error: function (status, error) {
                var errors = JSON.parse(status.responseText);
                var msg_error = "";
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

                return false;
            },
        })
    }

    const isUserRegisteredThenRegister = async (walletAddress, postData) => {
        console.log(walletAddress);
        try{
            const isRegister = await contract.methods.isRegistered(walletAddress).call();
            console.log(isRegister);    
            if(isRegister){
                const getUserData = await contract.methods.users(walletAddress).call();
                console.log(getUserData);   
                if(getUserData){
                    console.log(getUserData);
                    postData.parent_address = getUserData.parent;
                    postData.position = getUserData.position;
                    console.log(postData)
                    $.ajax({
                        url: "{{ route('register') }}",
                        type: "POST",
                        data: postData,
                        async: false,
                        success: function (response) {
                            hideLoader();
                            if(response.status == 200){
                                Notiflix.Notify.Success(response.message, "Success!");
                                // localStorage.setItem('insert_in_matrix', 1);
                                setTimeout(async function(){
                                    window.location.href = "{{ route('user.dashboard') }}";
                                }, 2000);
                            }else{
                                Notiflix.Notify.Failure(response.message, "Opps!");
                            }
                        },
                        error: function (status, error) {
                            hideLoader();
                            var errors = JSON.parse(status.responseText);
                            var msg_error = "";
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
                    });
                }
                else{
                    Notiflix.Notify.Failure('User not registered', "Opps!");
                }
            }
            else{
                Notiflix.Notify.Failure('User not registered', "Opps!");
            }
        }
        catch(e){
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
    }

    const connectWallet = async () => {
        if(detectMetaMask()){
            const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];
            if(account){
                userAccount = account;
                try{
                    const chainId 			=	await window.ethereum.request({"method": "eth_chainId", "params": []});
                    if(chainId == networkId){
                        const tokenContract     =   new web3.eth.Contract(tokenABI, tokenAddress);
                        const tokenBalance		=   await tokenContract.methods.balanceOf(userAccount).call();
                        tokenBal                =   parseFloat(tokenBalance.toString()/1000000000000000000);  
        
                        const getBNB 			=	await window.ethereum.request({method: 'eth_getBalance', params: [userAccount, "latest"]});
                        balBNB			        =	web3.utils.fromWei(getBNB, 'ether');
                        document.getElementById('bnb-coin').innerHTML = 'BNB : '+balBNB;
                        document.getElementById('bnb-token').innerHTML = 'USDT : '+tokenBal;
                    }
                    else{
                        ethereum.request({ method: 'wallet_switchEthereumChain', params:[{chainId: networkId}]}).then((result) => {
                            if(result == null){
                                connectWallet();
                            }
                        })
                        .catch(
                            (error) => Notiflix.Notify.Failure(error.message)
                        );
                    }
                }
                catch(e){
                    Notiflix.Notify.Failure(e.message, "Opps!");
                }
            }
            else{
                Notiflix.Notify.Failure('Please connect your wallet');
            }
        }
        else{
            Notiflix.Notify.Failure('Please install Ethereum wallet');
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

    const arroveToken = async (postData) => {
        try {
            const tokenContract     =   new web3.eth.Contract(tokenABI, tokenAddress);     
            const packAmount        =   25;
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

                                const getRegister       =   await contract.methods.register(sponser);
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
                                // const txHash = '0xa199d1bc355ddca7266be6c4f4e9e0715597ed8a5bb7bb88e58066a1f4dfe817';
                                let checkTxn = await new Promise(resolve => {
                                    setTimeout(async () => {
                                        const txReceipt = await checkTxnHash(txHash);
                                        console.log(txReceipt);
                                        resolve(txReceipt);
                                    }, 5000);
                                });
                                if (checkTxn.status == true) { 
                                    postData.txHash = txHash;
                                    console.log(postData);
                                    await isUserRegisteredThenRegister(userAccount, postData);
                                  
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
                        }, 15000);
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
                        payJoiningFee(account, referralId, sign);
                    }
                })
                .catch((error) => {
                    hideLoader();
                    Notiflix.Notify.Failure(error.message)
                });
            }
        }
        catch (err) {
            hideLoader();
            Notiflix.Notify.Failure(err.message);
        }
    }

    connectWallet();
      
    ///Register page form
    if(registerForm){
        registerForm.addEventListener('submit', function(e){
            e.preventDefault();
            showLoader();
            
            const formData = new FormData(this);
            sponser = formData.get('sponsor');
            if(!sponser){
                Notiflix.Notify.Failure('Please enter sponsor address');
                return false;
            }
            if(balBNB >= 0.0006){
                if(tokenBal >= 25){
                    register(userAccount);
                }
                else{
                    hideLoader();
                    Notiflix.Notify.Failure('Please you have insufficient USDT balance');
                }
            }
            else{
                hideLoader();
                Notiflix.Notify.Failure('sorry, you have insufficient BNB balance');
            }
        });
    }

    if(window.ethereum){
        const account = userAccount;
        
        window.ethereum.on('accountsChanged', function (accounts) {
            if(account != accounts[0]){
                connectWallet();
            }
        });
    }
</script>