<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @include('partials.seo')
  @stack('css-lib')
  <!-- Stylesheets -->
  <link href="{{ asset($themeTrue . 'css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset($themeTrue . 'css/style.css')}}" rel="stylesheet">
  <!-- Responsive File -->
  <link href="{{ asset($themeTrue . 'css/responsive.css')}}" rel="stylesheet">
  
  <!-- Responsive Settings -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>


<body>

  <div class="page-wrapper">
    @include($theme.'partials.loader')
    @include($theme.'partials.header')
    <!-- End Main Header -->
    @yield('content')
    @stack('extra-content')
    <!-- Main Footer -->
    @include($theme.'partials.footer')
  </div>
  <!--End pagewrapper--><!--Scroll to top-->
  <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

  <script src="{{ asset($themeTrue . 'js/jquery.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/popper.min.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/bootstrap.min.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/jquery-ui.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/jquery.fancybox.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/owl.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/scrollbar.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/appear.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/wow.js')}}"></script>
  <script src="{{ asset($themeTrue . 'js/custom-script.js')}}"></script>
  @stack('extra-js')

</body>

</html>