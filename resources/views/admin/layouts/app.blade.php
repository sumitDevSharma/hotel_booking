



<!DOCTYPE html><html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light"><head>
    

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ getFile(config('location.logoIcon.path').'favicon.png')}}">
    <title>@lang($basic->site_title) | @yield('title')</title>
    @stack('style-lib')

    <!-- App favicon -->
        
    <link rel="shortcut icon" href="{{ asset($themeTrue . 'images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset($themeTrue . 'images/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('admin/assets/libs/jsvectormap/css/jsvectormap.min.css')}}">
    <!-- App css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/assets/css/custom.css')}}" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Top Bar Start -->
    @include('admin.layouts.topbar')
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="index.html" class="logo">
                
                <span class="">
                    <img src="{{ asset($themeTrue . 'images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{ asset($themeTrue . 'images/logo.png')}}" alt="logo-large" class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        @include('admin.layouts.sidebar')
        <!--end startbar-menu-->    
    </div><!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">
              @yield('content')
                <!--end row-->
            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom justify-content-between">
                  <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                  <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">  
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked="">
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked="">
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->               
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->
            <!--Start Footer-->
            
           @include('admin.layouts.footer')

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
    
    <script src="{{asset('global/js/jquery.min.js') }}"></script>
    <script src="{{asset('global/js/popper.min.js') }}"></script>
    @stack('js-lib')
    <script src="{{ asset('global/js/notiflix-aio-2.7.0.min.js')}}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('global/js/feather.min.js') }}"></script>
    <script src="{{ asset('global/js/moment.min.js') }}"></script>
    <script src="{{ asset('global/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/admin.js') }}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/data/stock-prices.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jsvectormap/maps/world.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/index.init.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    @stack('js')
    @stack('extra-script')

    <script>
        "use strict";

        function copyToClipBoard(text) {
            const tempInput = document.createElement("input");
            tempInput.value = text;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            Notiflix.Notify.Success(`Copied: ${text}`);
        }
        $('body').on('click', '.link-copy', function () {
            var text = $(this).data('text');
            copyToClipBoard(text);
        });
        feather.replace();


    </script>



</body><!--end body--></html>