<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>Deals poa</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i|Roboto:400,400i,700,700i,900,900i" rel="stylesheet">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>
<body class="theme-light">


<div id="page">

  <div class="header header-demo header-logo-left bg-red-light mb-3 shadow-l">
              <a href="{{ route('home') }}" class="header-title color-white">Deals</a>
              <a href="{{ route('login') }}" class="header-icon header-icon-1"><i class="fas  color-black fa-sign-in-alt"></i></a>
              <a href="#" class="header-icon header-icon-2"><i class="fas color-white fa-bars"></i></a>
          </div>

    <div id="footer-bar" class="footer-bar-6">
      <a href="{{ route('home') }}" class="icon  bg-orange-light"><i class="fa fa-home"></i><span>Home</span></a>
      <a href="{{ route('home') }}" class = "icon" ><i class="fa fa-play"></i><span>Live</span></a>
      <a href="{{route('bids')}}"><i class="fa fa-user"></i><span>Account</span></a>
        <a data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>

    <div class="page-content">

        @yield('content')

    </div>
    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="{{ route('menu-main') }}" data-menu-width="280" data-menu-active="nav-welcome"></div>
</div>


<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/my.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>
