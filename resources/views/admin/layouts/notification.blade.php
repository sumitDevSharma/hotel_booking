@if (session()->has('success'))
    <script>
        Notiflix.Notify.Success("@lang(session('success'))");
    </script>
@endif

@if (session()->has('error'))
    <script>
        Notiflix.Notify.Failure("@lang(session('error'))");
    </script>
@endif

@if (session()->has('warning'))
    <script>
        Notiflix.Notify.Warning("@lang(session('warning'))");
    </script>
@endif

<script>

    $(document).ready(function () {
        $('.notiflix-confirm').on('click', function () {

        })
    })
    
    function showLoader() {
        Notiflix.Loading.Hourglass('Please wait...',{svgColor:"#820aff"}); // Hourglass, Circle, Che
        return true;
    }
    function hideLoader(){
        Notiflix.Loading.Remove();
        return true;
    }

    function amountFormat(amount, decimal = 18){
        return parseFloat(amount / Math.pow(10, decimal));
    }
</script>
