@extends($theme . 'layouts.user')
@section('title', $title)
@section('content')

<div id="transaction-history"></div>
<div class="deposit-table">
        <div class="container">
            <div class="deposit-history dash-card">
                <h4>{{$title}}</h4>
                <table class="w-100 table-responsive" id="income_list">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Wallet Type</th>
                            <th>TxHash</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('extra-js')
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#income_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user.get-withdrawal-ajax') }}",
                columns: [
                    { 
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false 
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'amount',
                        name: 'amount',

                    },
                    {
                        data: 'walletType',
                        name: 'walletType',

                    },
                    {
                        data: 'txhash',
                        name: 'txhash',
                    },


                ],
            });
        });

        

        
    </script>
@endpush