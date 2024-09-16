<header>
  <div class="topbar-main">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-5 col-12">
          <div class="topbar-left">
            <a href="{{route('home')}}">
              <img src="{{getFile(config('location.logoIcon.path').'logo.png' )}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="col-sm-7 col-12">
          <div class="topbar-right">
            <ul class="nav align-items-center justify-content-end">
              <li class="nav-item">
                <p class="nav-link m-0" >
                 {!!generateETHScanAddressLink(auth()->user()->wallet_address)!!}</p>
                 <div class="d-flex justify-content-between align-items-center">
                  <p  class="m-0"> Balance: <span id="user_balance">0</span></p>
                 </div>
                
              </li>
              <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset($themeTrue . 'images/profile-icon.png')}}" alt="" class="img-fluid">
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                  <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @if(!in_array(request()->route()->getName(), ['home']))
    @include($theme . 'partials.userNav')
  @endif
</header>