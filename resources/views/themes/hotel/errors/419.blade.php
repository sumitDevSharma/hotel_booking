@extends($theme.'layouts.error')
@section('title','419')
@section('content')
<style>
    section.not-found img {
    width: 100%;
    max-width: 350px
}
.h-100 {
    height: 100vh!important;
}
section.not-found p {
    margin: 20px;
    font-size: large;
}
</style>
    <section class="not-found">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col">
                    <div class="text-box text-center">
                        <img src="{{asset($themeTrue.'/images/404-error.png')}}" alt="..." />
                        <h1>@lang('419')</h1>
                        <p>@lang("Sorry, your session has expired")</p>
                        <a class="btn-primary mt-3" href="{{url('/')}}">@lang('Back To Home')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
