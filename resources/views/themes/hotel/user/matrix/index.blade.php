@extends($theme . 'layouts.user')
@section('title', $title)
@section('content')
@push('style')
<style>
    .scroll-content {
        cursor: auto !important;
    }
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }
    /* horizontal scrollbar  */

    .tree {
        width: fit-content;
        margin: auto;
    }
    .flex-between{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .top-20{
        top: 20px;
    }
    .start-20{
        left: 20px;
    }
    .end-20{
        right: 20px;
    }
    .badge-custom{
        width: 30px;
        height: 30px;
        font-weight: bold;
        line-height: 30px;
        text-align: center;
    }
    .badge-custom p{
        margin: 0;
        font-weight: bold;
    }
    .regen-box {
        border: 1px solid #efaf20;
        padding: 5px;
        border-radius: 8px;
        font-weight: 600;
    }
</style>
@endpush

<div class="container mt-3">
    <h2>Global Auto Pool</h2>
    <div class="row mt-3">
      
        @foreach($poolUser as $key =>$child)
        <div class="col-md-12 mb-3">
            <div class="genration-box dash-card d-flex flex-wrap align-items-center more-space position-relative">
               <div class="d-flex regen-box position-absolute gap-1 top-20 start-20 align-items-center">  @if($key > 0) Re-entry : @endif
                    <div class="badge-custom "><p>{{$child->id}}</p></div>
               </div>
                <div class="scroll-content" onmousedown="startDrag(event)">
                    <div class="tree" id="tree">
                        <ul>
                            <li><span><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar">
                                    <p class="text-white">{{sortWalletAddress($user_address, 5)}}</p>
                                </span>
                                <ul>
                                    @foreach($child->level1 as $level1)
                                    <li>
                                        <span><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar">
                                            <p class="text-white">{{sortWalletAddress($level1->walletId, 5)}}</p>
                                        </span>
                                        <ul>
                                            @foreach($child->level2 as $level2)
                                                @if($level2->parent_1 == $level1->id)
                                                    <li>
                                                        <span><img src="{{ asset($themeTrue . 'images/avatar1.png')}}" alt="" class="img-avatar">
                                                            <p class="text-white">{{sortWalletAddress($level2->walletId, 5)}}</p>
                                                        </span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                                
                                    </li>
                                    @endforeach
                                    @if(count($child->level1) < 5)

                                        @foreach(range($child->level1->count(),4) as $index)

                                        <li>
                                            <span><img src="{{ asset($themeTrue . 'images/avatar-empty11.png')}}" alt="" class="img-avatar"><p class="text-white">Empty</p></span>
                                        </li>
                                        @endforeach
                                    @endif

                                </ul>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>


</div>
@endsection
@push('script')

@endpush