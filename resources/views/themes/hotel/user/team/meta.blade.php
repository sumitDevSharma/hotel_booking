<div class="row balance-main">
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/user-icon1.png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
              
                <h5><span class="d-block" >Total Member</span><span id="total-member" class="income">{{$team ?? 0}}</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/user-icon1.png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block">Total Direct</span> <span  id="total-direct" class="income">{{$direct ?? 0}}</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/bmt-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block" >Team A</span><span id="team-a" class="income"> {{$teamA ?? 0}}</span></h5>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12 more-space">
        <div class="balance-outer dash-card d-flex flex-wrap align-items-center">
            <div class="img-outer">
                <img src="{{asset($themeTrue .'images/bmt-icon-(1).png')}}" alt="" class="img-fluid">
            </div>
            <div class="content-outer">
                <h5><span class="d-block" >Team B</span><span id="team-b" class="income"> {{$teamB ?? 0}}</span></h5>
            </div>
        </div>
    </div>
  
</div>