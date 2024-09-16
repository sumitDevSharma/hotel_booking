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
    var root = document.querySelector(':root');
    root.style.setProperty('--primary', '{{config('basic.base_color')??'#d09f06'}}');
    root.style.setProperty('--secondary', '{{config('basic.secondary_color')??'#e1651a'}}');

    function showLoader() {
        Notiflix.Loading.Hourglass('Please wait...',{svgColor:"#d09f06"}); // Hourglass, Circle, Che
        return true;
    }
    function hideLoader(){
        Notiflix.Loading.Remove();
        return true;
    }
    function amountFormat(amount){
        return parseFloat(amount.toString()/1000000000000000000);
    }
</script>
