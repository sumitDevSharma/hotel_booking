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
    <link href="{{ asset($themeTrue . 'css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset($themeTrue . 'css/style.css') }}" rel="stylesheet">
    <!-- Responsive File -->
    <link href="{{ asset($themeTrue . 'css/responsive.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/font-mytravel.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/dzsparallaxer.css') }}">
    <!-- Favicon -->
    <link href="https://transvelo.github.io/mytravel-html/assets/css/font-mytravel.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($themeTrue . 'css/theme.css') }}">

    <!-- Responsive Settings -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

</head>


<body>

    <div class="page-wrapper">
        @include($theme . 'partials.loader')
        @include($theme . 'partials.header')
        <!-- End Main Header -->
        @yield('content')
        @stack('extra-content')
        <!-- Main Footer -->
        @include($theme . 'partials.footer')
    </div>
    <!--End pagewrapper--><!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-up-arrow"></span></div>

    <script src="{{ asset($themeTrue . 'js/jquery.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/popper.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/bootstrap.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/jquery-ui.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/owl.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/scrollbar.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/appear.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/wow.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/custom-script.js') }}"></script>
    <!-- JS Implementing Plugins -->
    <script src="{{ asset($themeTrue . 'js/hs.megamenu.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/flatpickr.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/slick.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/dzsparallaxer.js') }}"></script>

    <!-- JS MyTravel -->
    <script src="{{ asset($themeTrue . 'js/hs.core.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.header.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.unfold.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.validation.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.show-animation.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.range-datepicker.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.selectpicker.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.go-to.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.slick-carousel.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/hs.quantity-counter.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(window).on('load', function() {
            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 1199.98,
                hideTimeOut: 0
            });

            // Page preloader
            setTimeout(function() {
                $('#jsPreloader').fadeOut(500)
            }, 800);
        });

        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#header'));

            // initialization of unfold component
            $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

            // initialization of show animations
            $.HSCore.components.HSShowAnimation.init('.js-animation-link');

            // initialization of datepicker
            $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

            // initialization of select
            $.HSCore.components.HSSelectPicker.init('.js-select');

            // initialization of quantity counter
            $.HSCore.components.HSQantityCounter.init('.js-quantity');

            // initialization of slick carousel
            $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>

    @stack('extra-js')

</body>

</html>
