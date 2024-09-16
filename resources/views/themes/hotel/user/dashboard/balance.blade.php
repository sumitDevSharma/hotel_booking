<div class="row">
    
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/bmt-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block" >Total Income</span><span id="total-income" class="income">$ 0.0000</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/wallet-img.png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
              
                <h5><span class="d-block" >Direct</span><span id="direct-income" class="income">$ 0.0000</span></h5>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/wallet-img.png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
              
                <h5><span class="d-block" >Level</span><span id="level-income" class="income">$ 0.0000</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/reward-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block" >Level Buy</span> <span id="level-buy-income" class="income">$ 0.0000</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/bmt-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block">Global </span> <span  id="global-income" class="income">$ 0.0000</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/reward-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <a href="javascript:void(0)" class="openWithdrwalModal">
                    <h5><span class="d-block" >Wallet 1</span><span id="balance-income" class="income-wallet wallet1-income " data-type="1">$ 0.0000</span></h5>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/reward-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <a href="javascript:void(0)" class="openWithdrwalModal">
                    <h5><span class="d-block" >Wallet 2 </span><span id="balance-income-2" class="income-wallet wallet2-income" data-type="2">$ 0.0000</span></h5>
                </a>
            </div>
        </div>
    </div>

    
</div>

@if(request()->routeIs('user.dashboard'))
    @push('extra-content')

    <div class="modal fade" id="openWithdrwalModal" tabindex="-1" aria-labelledby="stakingModalLable" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h2 class="modal-title fs-5 text-center" id="stakingModalLable">Withdrawal</h2>
                    <h3 class="modal-title fs-5 text-center">Balance : <span class="income text-success wallet-amount">$ 0.0000</span></h3>
                        
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="" id="withdrwal-form">
                                <input type="number" name="amount" inputmode="numeric" class="form-control" placeholder="Enter Amount" >
                                <input type="hidden" name="type" value="0">
                                <div class="mt-4 d-flex gap-3 justify-content-center">
                                    <button type="submit" class="btn btn-primary">Claim Now</button>
                                    
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endpush
    @push('extra-script')

    <script>
        $(document).ready(function(){
            $('body').on('click', '.income-wallet', function () {
                var type = $(this).data('type');
                if(type == 2){
                    var directMember = {{$direct}};
                    if(directMember < 2){
                        Notiflix.Notify.Failure('You need atleast 2 direct member to withdraw from this wallet');
                        return false;
                    }
                    var boughtSlotCount = {{$boughtSlotCount}}
                   
                    if(boughtSlotCount < 1){
                        Notiflix.Notify.Failure('You need atleast 1 TopUp to withdraw from this wallet');
                        return false;
                    }
                    
                }
                var amount = $(this).text();
                amount = amount.replace('$', '');
                amount = amount.trim();
                if(amount == '0.0000'){
                    Notiflix.Notify.Failure('You have no balance in this wallet');
                    return false;
                }
                $('.wallet-amount').text('$ '+amount);
                // add type in form
                $('input[name="type"]').val(type);
                
                $('#openWithdrwalModal').modal('show');

            });

            $('body').on('input', 'input[name="amount"]', function () {
                var amount = $(this).val();
                // check amount is only number
                if(isNaN(amount)){
                    $(this).val('');
                    Notiflix.Notify.Failure('Please enter valid amount');
                    return false;
                }
                var balance = $('.wallet-amount').text();
                balance = balance.replace('$', '');
                balance = balance.trim();
                if(parseFloat(amount) > parseFloat(balance)){
                   
                    Notiflix.Notify.Failure('Withdrawal amount should be less than or equal to balance');
                    return false;
                }
                
            });
            const withdrawAmountFromWallet = async (amount ,type) => {
                try{
                    console.log(amount, type);
                    const chainId 			=	await window.ethereum.request({"method": "eth_chainId", "params": []});      
                    amount =  web3.utils.toWei(amount, 'ether');
                       
                    if(chainId == networkId){   
                        const bussinessContract         =   new web3.eth.Contract(contractABI, contractAddress);

                        const userWithdrawBalance       =   await bussinessContract.methods.userWithdrawBalance(amount, type);
                        const userWithdrawBalanceABI    =   await userWithdrawBalance.encodeABI();
                        
                        const txHash = await window.ethereum.request({
                            method: 'eth_sendTransaction',
                            params: [
                                {
                                    from: userAccount,
                                    to: contractAddress,
                                    data: userWithdrawBalanceABI,
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
                                    url: "{{route('user.add-withdrwal')}}",
                                    type: "POST",
                                    data: {
                                        wallet_address: userAccount,
                                        amount: amountFormat(amount),
                                        walletType: type,
                                        txHash: txHash,
                                        _token: "{{ csrf_token() }}",
                                    },
                                    success: function (response) {
                                        if(response.status == 200){
                                            hideLoader();
                                            setTimeout(async function(){
                                                Notiflix.Notify.Success(response.message, "Success!");
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
                            Notiflix.Notify.Failure('Transaction failed', "Opps!");

                        }
                        
                    }
                    else{
                        ethereum.request({ method: 'wallet_switchEthereumChain', params:[{chainId: networkId}]}).then((result) => {
                            withdrawAmountFromWallet(amount, type)
                        })
                    }
                }
                catch(e){
                    
                    throw new Error(e.message);
                }
                
            }

            $('body').on('submit', '#withdrwal-form', async function (e) {
                e.preventDefault();
                var amount = $(this).find('input[name="amount"]').val();
                if(amount == ''){
                    Notiflix.Notify.Failure('Please enter amount');
                    return false;
                }
                var type = $(this).find('input[name="type"]').val();
                console.log(amount);
                console.log(type);
                try{
                 
                    showLoader();
                    await withdrawAmountFromWallet(amount, type);
                    hideLoader();
                    $('#openWithdrwalModal').modal('hide');
                }
                catch(e){
                    hideLoader();
                    Notiflix.Notify.Failure(e.message, "Opps!");
                }
                
            });
        });
    </script>

    @endpush
@endif