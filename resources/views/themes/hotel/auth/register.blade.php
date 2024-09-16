@extends($theme . 'layouts.app')
@section('title', 'Register')
@section('content')
<!-- login section -->
<div class="signup-main register-main d-flex flex-wrap align-items-center justify-content-between">
	<div class="container">
		<div class="logo-outer">
			<a href="{{route('home')}}">
				<img src="{{getFile(config('location.logoIcon.path').'logo.png') }}" alt="" class="img-fluid">
			</a>
		</div>

		<div class="register-outer">
			<form id="registerForm">
				<div class="row">
					<div class="col-12 mb-4 text-center">
						<span class="badge bg-primary" id="bnb-coin">BNB : 0</span>
						<span class="badge bg-warning" id="bnb-token">USDT : 0</span>
					</div>
					<div class="col-12">
						<div class="form-group">
							<label>Referral Code</label>
							<input type="text" name="sponsor" placeholder="Enter Referral Code" value="{{ session()->get('sponsor') }}" class="form-control">
							<div class="text-danger" id="referral-err"></div>
						</div>
					</div>
					<div class="col-12">
						<div class="connect-btn text-center">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>

				</div>
			</form>
		</div>

		<div class="register-wallet">
			<div class="separator">
				<hr class="line">
				<p class="text-center">Dapp Recommended Wallets</p>
				<hr class="line">

			</div>
			<div class="register-wallet-inner">
				<ul>
					<li>
						<a href="https://metamask.io/download/">
							<img src="{{asset('/themes/titan/images/meta-mask.png')}}" alt="">
						</a>
					</li>
					<li>
						<a href="https://trustwallet.com/download">
							<img src="{{asset('/themes/titan/images/trust-wallet.png')}}" alt="">
						</a>
					</li>
					<li>
						<a href="https://www.ancrypto.io/">
							<img src="{{asset('/themes/titan/images/ancrypto.png')}}" alt="">
						</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>

@endsection
@push('script')
@include($theme.'partials.script')
@endpush