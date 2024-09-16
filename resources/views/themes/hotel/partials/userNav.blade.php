<!-- navbar -->
@php
use App\Models\Reward;
$rewards = Reward::where('type', 1)->get();
@endphp
<nav class="navbar">
    <div class="container">
        <a class="navbar-brand d-md-none" href="#">Navbar</a>
        <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="nav overFlow-x-scroll">
                <li class="nav-item">
                    <a class="nav-link {{menuActive('user.dashboard')}}" aria-current="page" href="{{route('user.dashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Team
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item"  href="{{route('user.team','all')}}" role="button" aria-expanded="false">All Team</a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{route('user.team',['all','left'])}}" role="button" aria-expanded="false">Team A</a>
                        </li>
                        <li>
                            <a class="dropdown-item"  href="{{route('user.team',['all','right'])}}" role="button" aria-expanded="false">Team B</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('user.team','direct')}}" role="button" aria-expanded="false">Team Direct</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('user.team',['direct','left'])}}" role="button" aria-expanded="false">Team Direct A</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('user.team',['direct','right'])}}" role="button" aria-expanded="false">Team Direct B</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Transactions
                    </a>
                    <ul class="dropdown-menu">
                        @if($rewards->count() > 0)
                        @foreach($rewards as $reward)
                        <li><a class="dropdown-item" href="{{route('user.bonus', $reward->slug)}}">{{$reward->name}}</a>
                        </li>
                        @endforeach
                        @endif
                        <li><a class="dropdown-item" href="{{route('user.withdrawal')}}">Withdrawal</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{menuActive('user.matrix')}}" aria-current="page" href="{{route('user.matrix')}}">Global Auto Pool</a>
                </li>
            </ul>
        </div>
    </div>
</nav>