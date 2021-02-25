<div class="content mt-0">

<div class="list-group list-custom-small list-menu">
    <div class="menu-title mb-1">
        <p class="">Logged in as: {{{ucfirst(trans(Auth::user()->profile_name))??'User' }}}</p>
        <a class="close-menu"><i class="fa fa-times-circle rounded-sm bg-red-dark"></i></a>
    </div>

    <div class="divider divider-margins mt-1 mb-0"></div>
	
    <a id="nav-welcome">
        <i class="fa fa-wallet rounded-sm bg-brown-dark"></i>
        <span>Account Balance: {{{ Auth::user()->accountBalance??0  }}}</span>
    </a>     

    <div class="divider divider-margins mt-0 mb-0"></div>

    <a id="nav-homepages" href="{{route('deposit')}}">
        <i class="fa fa-credit-card rounded-sm gradient-green color-white"></i>
        <span>Deposit</span>
        <i class="fa fa-angle-right"></i>
    </a>

    <div class="divider divider-margins mt-0 mb-0"></div>

    <a id="nav-components" href="{{route('bids')}}">
        <i class="fa fa-dollar-sign gradient-blue color-white"></i>
        <span>Bids history</span>
        <i class="fa fa-angle-right"></i>
    </a>

    <div class="divider divider-margins mt-0 mb-1"></div>
   
        <form action="{{ route('logout') }}" method="post">
        @csrf
            <button type="submit" class="btn" style="background-color:orange;">Logout</button>
        </form>
</div>

