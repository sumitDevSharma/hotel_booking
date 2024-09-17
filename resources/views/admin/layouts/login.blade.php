<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ getFile(config('location.logoIcon.path').'favicon.png')}}">
    <title>@yield('title') | {{$basic->site_title}}</title>
    <link rel="stylesheet" href="{{asset('admin/css/admin-style.css')}}" data-n-g="">
    @stack('css')
</head>

<body>
    <div id="__next">
        <div class="d-flex align-items-center min-vh-100 bg-auth border-top border-top-2 border-primary">
            <div class="container">
                <div class="align-items-center row">
                    <div class="offset-xl-2 offset-md-1 order-md-2 mb-5 mb-md-0 col-md-6 col-12 d-lg-block  d-xs-none">
                        <div class="text-center"><img class="img-fluid" src="{{asset('admin/images/happiness.svg')}}"
                                alt="..."></div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>



    <script src="{{asset('global/js/jquery.min.js') }}"></script>
    <script src="{{asset('global/js/popper.min.js') }}"></script>
    <script src="{{ asset('global/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('global/js/notiflix-aio-2.7.0.min.js')}}"></script>
    @stack('js-lib')

    @stack('js')
    @include('admin.layouts.notification')
    <script>
        "use strict";
        $(".preloader ").fadeOut();
    </script>

</body>

</html>