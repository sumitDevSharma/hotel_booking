@extends($theme . 'layouts.app')
@section('title', trans('Home'))
@section('content')
    <style>
        .right-0 {
            right: 0;
        }

        .left-0 {
            left: 0;
        }

        .bottom-0 {
            bottom: 0;
        }
    </style>
    @include($theme . 'sections.banner')
    @include($theme . 'sections.hotels')


@endsection
