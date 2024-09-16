@extends($theme . 'layouts.user')
@section('title', trans('Dashboard'))
@section('content')
    <!-- main -->
    <div class="dash-main position-relative">
        <div class="balance-main">
            <div class="container">
                @include($theme . 'user.team.meta')
                @include($theme.'user.dashboard.balance')
                @include($theme.'user.dashboard.package')
                @include($theme.'user.dashboard.binaryTree')
                @include($theme.'user.dashboard.refferbox')
            </div>
        </div>
    </div>

@endsection



