<script>
    var sponser = null;
    let userAccount         =   '';
    const web3              =   new Web3(window.ethereum);
    const tokenAddress      =   '{{$contract->tokenAddress}}';
    const tokenABI          =   @json($contract->tokenABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const contractAddress   =   '{{$contract->contractAddress}}';
    const contractABI       =   @json($contract->contractABI, JSON_HEX_QUOT | JSON_HEX_TAG);
    const networkId         =   '{{$contract->networkId}}';

    const registerTopic     =   '{{$contract->registerTopic}}';
    const apiKey            =   '{{$contract->apiKey}}';
    const apiUrl            =   '{{$contract->apiUrl}}';
    const contract          =   new web3.eth.Contract(contractABI, contractAddress);
    function detectMetaMask() {
        if(typeof window.ethereum !== 'undefined') {
            return true;
        }
        else{
            return false;
        }
    }

    const register = async (postData) => {
        try{
            $.ajax({
            url: "{{ route('register') }}",
            type: "POST",
            data: postData,
            async: false,
            success: function (response) {
                hideLoader();
                if(response.status == 200){
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
        catch(e){
            hideLoader();
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
      
    }

    const addMissingUser  = async (walletAddress, postData) => {
        try{
            showLoader();
            const getResponse = await getContactTopic(contractAddress);
            console.log(getResponse);
            console.log(walletAddress);
            getResponse.result.forEach(async function (item) {
                // console.log(item.topics[2]);
                // decode topic
                const decoded =  await web3.eth.abi.decodeParameter('address', item.topics[1]);
               
                if(decoded.toLowerCase() == walletAddress.toLowerCase()){        
                      
                    const getUserData = await contract.methods.users(walletAddress).call();
                    console.log(getUserData);    
                    postData.txHash         = item.transactionHash;;
                    postData.wallet_address = walletAddress;
                    postData.signature      = postData.signature;
                    postData.sponsor        = getUserData.ref;
                    postData.parent_address = getUserData.parent;
                    postData.position       = getUserData.position;
                    postData._token = "{{ csrf_token() }}";

                    console.log(postData);
                    register(postData);

                }
                

            });
            
        }
        catch(e){
            hideLoader();
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
    }

    const getContactTopic = async (contractAddress) => {
        console.log('getContactTopic calling...');
        const url = `${apiUrl}/api?module=logs&action=getLogs&fromBlock=0&toBlock=latest&address=${contractAddress}&topic0=${registerTopic}&apikey=${apiKey}`;
        console.log(url);
        const response = await fetch(url);
        const data = await response.json(); 
        return data;
    }
       
    const isUserRegistered = async (walletAddress, data, errorMsg) => {
        try{
            const contract = new web3.eth.Contract(contractABI, contractAddress);
            const isRegister = await contract.methods.isRegistered(walletAddress).call();
            console.log(isRegister);
            if(isRegister){
                addMissingUser(walletAddress, data);
            }
            else{
                Notiflix.Notify.Failure('User not registered', "Opps!");
            }
        }
        catch(e){
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
    }

    const login = async (walletAddress) => {
        try{
            showLoader();
            const exampleMessage    = 'Login in One Million Earn For '+ walletAddress;
            const from              =	walletAddress;
            const encoder           =	new TextEncoder();
            const uint8Array        =	encoder.encode(exampleMessage);
            const hexString         =	Array.from(uint8Array, byte => byte.toString(16).padStart(2, '0')).join('');
            const msg               =	`0x${hexString}`;
            const signature         =	await window.ethereum.request({ method: 'personal_sign', params: [msg, from, 'Example password']});
            const data              =   {
                                            wallet_address: walletAddress,
                                            signature: signature,
                                            _token: "{{ csrf_token() }}",
                                        };

            $.ajax({
                    url: "{{ route('login') }}",
                    type: "POST",
                    data: data,
                    async: false,
                    success: function (response) {
                        if(response.status == 200){
                            Notiflix.Notify.Success(response.message, "Success!");
                            setTimeout(function(){
                                window.location.href = "{{ route('user.dashboard') }}";
                            }, 2000);
                        }
                    },
                    error: function (status, error) {
                        var errors = JSON.parse(status.responseText);
                        var msg_error = "";
                        if (errors.status == 422) {
                            isUserRegistered(walletAddress, data, msg_error);                                            
                        } else {
                            Notiflix.Notify.Failure(errors.message, "Opps!");
                        }
                    },
                    complete: function () {
                        hideLoader();
                    }
                });      
                                       
        }
        catch(e){
            hideLoader();
            Notiflix.Notify.Failure(e.message, "Opps!");
        }
      
    }    

    const connectWallet = async () => {
        if(detectMetaMask()){
            const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];
            if(account){
                userAccount = account;
                

                login(userAccount);
            }
            else{
                Notiflix.Notify.Failure('Please connect your wallet');
            }
        }
        else{
            Notiflix.Notify.Failure('Please install Ethereum wallet');
        }
    }
   
    const connectWalletBtn  = document.getElementById('connectWalletBtn');
    ///Home page Connect wallet button
    if(connectWalletBtn){
        connectWalletBtn.addEventListener('click', connectWallet);
    }

 
    

</script>