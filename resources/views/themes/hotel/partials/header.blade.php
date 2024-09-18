<!-- navbar -->


<header class="main-header header-style-one">
  <!-- Header Upper -->
  <div class="header-upper">
      <div class="inner-container clearfix">
          <!--Logo-->
          <div class="logo-box">
              <div class="logo"><a href="{{route('home')}}" title=""><img
                          src="{{ asset($themeTrue . 'images/logo.png')}}" alt=""
                          title="Hotel Booking"></a></div>
          </div>
          <div class="nav-outer clearfix">
              <!--Mobile Navigation Toggler-->
              <div class="mobile-nav-toggler"><span class="icon flaticon-menu-2"></span><span
                      class="txt">Menu</span></div>

              <!-- Main Menu -->
              @include($theme.'partials.nav')
          </div>

          <div class="other-links clearfix">
              <div class="info">
                  <ul class="clearfix">
                      <li><a href="{{route('login')}}"><span class="icon flaticon-padlock"></span><span
                                  class="txt">Login</span></a></li>
                      <li><a href="te:+502542163754"><span class="icon flaticon-smartphone-2"></span><span
                                  class="txt">+91 7007959656</span></a></li>
                  </ul>
              </div>
              <div class="link-box">
                  <a href="room-single.html" class="theme-btn btn-style-one"><span class="btn-title">Book Your
                          Stay</span></a>
              </div>
          </div>

      </div>
  </div>
  <!--End Header Upper-->

  <!-- Mobile Menu  -->
  <div class="mobile-menu">
      <div class="close-btn"><span class="icon flaticon-targeting-cross"></span></div>
      <div class="menu-backdrop"></div>
      <div class="nav-logo"><a href="{{route('home')}}"><img src="{{ asset($themeTrue . 'images/logo.png')}}" alt="" title=""></a></div>
      <nav class="menu-box">
          <div class="menu-outer">
              <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
          </div>
      </nav>
      <div class="nav-bottom">
          <div class="copyright">Hotel Booking © 2020 All Right Reserved</div>
          <!--Social Links-->
          <div class="social-links">
              <ul class="clearfix">
                  <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                  <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                  <li><a href="#"><span class="fab fa-vimeo-v"></span></a></li>
              </ul>
          </div>
      </div>
  </div><!-- End Mobile Menu -->
</header>
