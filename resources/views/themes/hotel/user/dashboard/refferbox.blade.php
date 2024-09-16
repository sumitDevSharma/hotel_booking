<div class="refer-box dash-card d-flex flex-wrap align-items-center">
    <div class="img-outer text-center">
        <img src="https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl={{route('register.sponsor',auth()->user()->wallet_address)}}choe=UTF-8"
            alt="QR Code" title="QR Code" id="refQRcode">
    </div>
    <div class="content-outer">
        <h6>Thank you for your interest to our One Million Earn</h6>
        <p>You can contribute Titan One Million Earn token go through Buy Token page. You can get a quick response to any
            questions, and chat with the project in our
        </p>
        <h6 class="text-break">Sponser ID: {{auth()->user()->referral_address}}</h6>
        <p class="refferal-link">Refferal Link: <a href="{{route('register.sponsor',auth()->user()->wallet_address)}}"
                target="_blank">{{route('register.sponsor',auth()->user()->wallet_address)}}</a> <i data-feather="copy" class="link-copy" data-text="{{route('register.sponsor',auth()->user()->wallet_address)}}"></i>
        </p>
        <h6>Referral Link will activate after Investment</h6>
        <p></p>
        <div class="download-btn">
            <a href="{{route('presentation')}}" target="_blank" class="btn btn-primary">Download PDF</a>
            <a href="{{$contract->contractUrl}}" target="_blank" class="btn btn-primary">Smart Contract</a>
        </div>

    </div>
</div>