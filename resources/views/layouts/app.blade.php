<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/new.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="top">
        <div id="overlay">
            <br>
        <h1 class="text-light text-center">Lowest Unique Bid</h1>
        </div>
        </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block img-fluid" src="https://image.coolblue.nl/840x473/content/fd913ca424803c24e59944b84d9ffd65" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block img-fluid" src="https://www.phoneplacekenya.com/wp-content/uploads/2020/02/Tecno-Camon-15.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block img-fluid" src="https://brain-images-ssl.cdn.dixons.com/2/7/10200772/u_10200772.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <nav class="navbar navbar-expand-lg text-light text-center">
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <ul class="nav  nav-fill w-100 mt-2 mt-lg-0 ">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('home') }}">
            <i class="fa fa-3x fa-home" ></i>
            <p >Home</p>
            
            </a>
            
        </li>
        <li class="nav-item dropup">
            <i class="fa fa-3x fa-user"></i>
            <p class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#home">Account</p>
            <div class="dropdown-menu">
                @auth
                <a class="dropdown-item" href="#">Account balance: 0</a>
                <a class="dropdown-item" href="#">Deposit</a>
                <a class="dropdown-item" href="{{ route('bids') }}">Bids history</a>
                <!-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> -->
                <form action="{{ route('logout') }}" method="post" class="dropdown-item">
                    @csrf
                    <button type="submit"  class="btn btn-sm" style="margin-top:2%;background-color:orange;color:white;">Logout</button>
                </form>
                @endauth

                @guest
                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                @endguest
            </div>
        </li>
        <li class="nav-item dropup">
            <i class="fa fa-3x fa-ellipsis-v"></i>
            <p class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#home">More</p>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">How To</a>
                <a class="dropdown-item" href="#">About Us</a>
                <a class="dropdown-item" href="#">Completed Bids</a>
            </div>
        </li>
      </ul>
  </nav>

        <main class="py-4">
        @auth
        <div class="container card">
            <div class="row text-center">
                <p class="col-6">Logged in as: <strong>{{ auth()->user()-> first_name }}</strong></p>
                <form class="col-6" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm" style="margin-top:1%;margin-bottom:1%;background-color:orange;color:white;">Logout</button>
                        </form>
            </div>
        </div>
        @endauth
            @yield('content')
        </main>
    </div>
</body>
</html>
