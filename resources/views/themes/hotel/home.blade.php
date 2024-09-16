@extends($theme . 'layouts.app')
@section('title', trans('Home'))
@section('content')

@include($theme.'sections.banner')
@include($theme.'sections.about-us')
@include($theme.'sections.facts-section')
<div class="dashed-separator">
    <div class="auto-container"><span></span></div>
</div>
@include($theme.'sections.rooms-section-one')

@endsection