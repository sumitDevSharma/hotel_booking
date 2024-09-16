@extends($theme . 'layouts.user')
@section('title', trans('Dashboard'))
@section('content')
    <!-- main -->
    
    <div class="dash-main position-relative">
        <div class="balance-main">
            <div class="container">
                
                @include($theme . 'user.team.meta')
                @include($theme.'user.dashboard.balance')
                @include($theme.'user.dashboard.binaryTree')
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
       var userAddress  ="{{$user->wallet_address}}";
       console.log(userAddress);
       getAccount(userAddress);
       
    </script>
@endpush




