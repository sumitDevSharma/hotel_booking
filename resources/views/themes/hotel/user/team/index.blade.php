@extends($theme . 'layouts.user')
@section('title', $title)
@section('content')
@push('style')
<style>
    .dataTables_filter {
        float: inline-end;
    }
    .dataTables_paginate  {
        float: inline-end;
        margin: 10px 0;
    }
    .dataTables_info {
        margin: 10px 0;
    }
    #team_list{
        width: 100%!important;
        overflow-x: auto;
    }
</style>
@endpush

<div class="container mt-3">
    
    <div class="deposit-table">
        <div class="container">
            <h2 class="mb-3">{{$title}}</h2>
            @include($theme . 'user.team.meta')
            <div class="deposit-history dash-card mt-3">
                <table class= "table-responsive" id="team_list">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Wallet Addrees</th>
                            <th>Refferal</th>
                            <th>Parent</th>
                            <th>Date of Joining</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>


</div>
@endsection
@push('script')
<script>
        $(document).ready(function() {
            $('#team_list').DataTable({
                processing: true,
                width: "100%",
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw text-center"></i><span class="sr-only">Loading...</span> '
                },
                serverSide: true,
                ajax: "{{ route('user.get-team-ajax') }}?type={{$type}}&position={{$position}}",
                columns: [
                    { 
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex', 
                        orderable: false, 
                        searchable: false 
                    },
                    {
                        data: 'wallet_address',
                        name: 'wallet_address',

                    },
                    {
                        data: 'referral_address',
                        name: 'referral_address',
                    },
                    {
                        data: 'parent_address',
                        name: 'parent_address',
                    },
                    {
                        data: 'doj',
                        name: 'doj',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    },


                ],
            });
        });

        

        
    </script>
@endpush