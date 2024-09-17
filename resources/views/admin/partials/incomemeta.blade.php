<div class="row">
    <h3 class="text-muted">Income and Bonuses</h3>
    @if($rewards->count() > 0)
    @foreach($rewards as $reward)
        @include('admin.components.incomebox')
    @endforeach
    @endif
    @include('admin.components.adminwalletbox', ['name' => 'totaluser1'])
    @include('admin.components.adminwalletbox', ['name' => 'totaluser2'])
    <div class="f-flex mt-2 mb-2">
        <h3 class="text-muted m-0">Admin Wallets</h3>
        <button type="button" class="btn btn-sm btn-primary withdrwalBtn">Withdrawal</button>
    </div>
    @include('admin.components.adminwalletbox', ['name' => 'contract'])
    @include('admin.components.adminwalletbox', ['name' => 'admin1'])
    @include('admin.components.adminwalletbox', ['name' => 'admin2'])
    @include('admin.components.adminwalletbox', ['name' => 'admin3'])
    @include('admin.components.adminwalletbox', ['name' => 'undistributed'])
    
</div>