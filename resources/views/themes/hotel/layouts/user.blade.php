<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('partials.seo')
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/bootstrap.min.css') }}" />
    @stack('css-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/owl.theme.default.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/aos.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/fancybox.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/tree.css') }}" />

    <script src="{{ asset($themeTrue . 'js/fontawesomepro.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/loader.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset($themeTrue . 'css/backend-style.css') }}" />
    @stack('style')
    <style>
        .navbar {
            background-color: #000;
            padding: 15px 0;
            box-shadow: 0px 1px 10px rgb(110 93 32 / 40%);
            /* box-shadow: 0px 1px 10px rgb(47 117 243 / 25%); */
        }
    </style>
</head>

<body style="position:relative">
    <div class="dashboard-wrapper">
    <div id="particle-canvas" style="position: relative;">
        <div style="position: absolute; inset: 0px; z-index: 1; background: rgb(26, 37, 47);">
        </div>
        <canvas style="z-index: 20; position: relative;"></canvas>
    </div>
    @include($theme.'partials.loader')
    @include($theme . 'partials.userHeader')

    <div class="dash-main position-relative"> @yield('content')</div>
    @include($theme . 'partials.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

   

    @stack('loadModal')
    @stack('extra-content')

    <script>
        feather.replace();
    </script>
    <script src="{{ asset('global/js/popper.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/jquery.min.js') }}"></script>


    <script src="{{ asset($themeTrue . 'js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/select2.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('global/js/web3.min.js') }}" ></script>
    <script src="{{ asset('/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/admin/js/datatable-basic.init.js') }}"></script>
    @stack('extra-js')

    <script src="{{ asset($themeTrue . 'js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/aos.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/socialSharing.js') }}"></script>
    <script src="{{ asset($themeTrue . 'js/script.js') }}"></script>


    <script src="{{ asset('global/js/pusher.min.js') }}"></script>
    <script src="{{ asset('global/js/vue.min.js') }}"></script>
    <script src="{{ asset('global/js/axios.min.js') }}"></script>
    <script src="{{ asset('global/js/notiflix-aio-2.7.0.min.js') }}"></script>
    <script src="{{ asset('global/js/particle.js') }}"></script>
    <script src="{{ asset('global/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('global/js/admin.js') }}"></script>


    @include($theme.'user.scripts.dashboard')
    @stack('script')
    @stack('extra-script')
    <script type="text/javascript">
        if(window.ethereum){
            const account = '{{ auth()->user()->wallet_address }}';
            window.ethereum.on('accountsChanged', function (accounts) {
                if(account != accounts[0]){
                    Notiflix.Notify.Failure('You changed your account. Please login again.');
                    window.location.href = "{{route('user.logout')}}";
                }
            });
        }
    </script>

    @include($theme . 'partials.notification')
    @if ($errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp
        <script>
            "use strict";
            @foreach ($errors as $error)
            Notiflix.Notify.Failure("{{trans($error)}}");
            @endforeach
        </script>
    @endif
  
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
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        //add trigger hover for popover
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl, {
                trigger: 'hover'
            })
        })
        // on mobile devices remove hover trigger
        if (window.innerWidth < 768) {
            popoverList.forEach(function (popover) {
                popover._config.trigger = 'click';
            });
        }

    </script>
    

</body>

</html>
