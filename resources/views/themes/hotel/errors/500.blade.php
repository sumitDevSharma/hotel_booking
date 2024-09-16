@extends($theme.'layouts.error')
@section('title','500')
@section('content')
<style>
    section.not-found img {
    width: 100%;
    max-width: 350px
}
section.not-found p {
    margin: 20px;
    font-size: large;
}
.h-100 {
    height: 100vh!important;
}
</style>
    <section class="not-found">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col">
                    <div class="text-box text-center">
                        <img src="{{asset($themeTrue.'/images/404-error.png')}}" alt="..." />
                        <h1>@lang('Internal Server Error')</h1>
                        <p>@lang("The server encountered an internal error misconfiguration and was unable to complate your request. Please contact the server administrator.")</p>
                        <a class="btn-primary mt-3" href="{{url('/')}}">@lang('Back To Home')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
