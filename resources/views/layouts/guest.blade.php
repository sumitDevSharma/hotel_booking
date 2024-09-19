<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('partials.seo')

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset($themeTrue . 'images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset($themeTrue . 'images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <!-- App css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('global/js/jquery.min.js') }}"></script>

</head>


<!-- Top Bar Start -->

<body>
    <div class="container-xxl">
        {{ $slot }}
    </div><!-- container -->


</body><!--end body-->

<script src="{{ asset('global/js/notiflix-aio-2.7.0.min.js') }}"></script>
<script src="{{ asset('global/js/feather.min.js') }}"></script>
<script src="{{ asset('global/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('global/js/admin.js') }}"></script>

</html>
