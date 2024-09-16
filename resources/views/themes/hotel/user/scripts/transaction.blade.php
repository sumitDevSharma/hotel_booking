
<script>
    const connectWallet = async () => {
        if(detectMetaMask()){
            const accounts = await ethereum.request({ method: 'eth_requestAccounts' });
            const account = accounts[0];
            if(account){
                userAccount = account;
                console.log(userAccount);
            }
            else{
                Notiflix.Notify.Failure('Please connect your wallet');
            }
        }
        else{
            Notiflix.Notify.Failure('Please install Ethereum wallet');
        }
    }
    
    connectWallet();
    
    const getTransactionReceipt = async (txHash) => 
    {
        try {
            console.log(txHash);
            console.log(web3);

            const receipt = await web3.eth.getTransactionReceipt(txHash);
            const log = receipt.logs;
            const eventAbi = contractABI.find(item => item.type === 'event' && item.name === "SendIncome"); // Replace with your actual event name
            const incomeArr = [];

            log.forEach(logItem => {
                if (eventAbi.signature === logItem.topics[0]) {
                    const decodedData = web3.eth.abi.decodeLog(eventAbi.inputs, logItem.data, logItem.topics.slice(1));

                    // Ensure all required parameters are decoded
                    if (
                        decodedData.hasOwnProperty('user') &&
                        decodedData.hasOwnProperty('amount') &&
                        decodedData.hasOwnProperty('text') &&
                        decodedData.hasOwnProperty('note')
                    ) {
                        const text = web3.utils.hexToAscii(decodedData['text']);
                        const note = web3.utils.hexToAscii(decodedData['note']);
                        incomeArr.push({
                            user: decodedData['user'],
                            amount: amountFormat(decodedData['amount']), // Assuming amountFormat is defined somewhere
                            text: text,
                            note: note
                        });
                    } else {
                        console.error("Incomplete data decoded from the log:", decodedData);
                    }
                }
            });

            console.log(incomeArr);
        } catch (error) {
            console.error('Error fetching transaction receipt:', error);
        }
    }


    getTransactionReceipt('0x012ed61da0c72cbc4ada063e6f6b17e8f24c9f17b470a9d47289bf673e8b2ed3');
   
        
   
    
</script>

