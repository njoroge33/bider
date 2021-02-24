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
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
    
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
    
    <div class="header header-auto-show header-fixed header-logo-center">
        <a href="{{route('home')}}" class="header-title color-orange-light">Deals poa</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-user"></i></a>
    </div>
    
    <div id="footer-bar" class="footer-bar-6">
        <a data-menu="menu-share"><i class="fa fa-user"></i><span>Account</span></a>
        <a href="{{ route('home') }}" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Home</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>
           
    <div class="page-title page-title-fixed">
        <h1 class="color-orange-light" >Deals poa</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-user"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
        <p class="text-center color-orange-light font-weight-bold">Today's hot deals</p>
            
                
        <div class="double-slider owl-carousel owl-no-dots">
            <div class="item">
                <div data-card-height="220" class="card shadow-xl rounded-m bg-6">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Techno camon 15</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <div class="item">
                <div data-card-height="220" class="card shadow-xl rounded-m bg-16">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Real me earphones</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <div class="item">
                <div data-card-height="220" class="card shadow-xl rounded-m bg-19">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Ampex woofer</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <div class="item">
                <div data-card-height="220" class="card shadow-xl rounded-m bg-31">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Punex double charger</h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
            <div class="item">
                <div data-card-height="220" class="card shadow-xl rounded-m bg-33">
                    <div class="card-bottom text-center">
                        <h4 class="color-white font-10 mb-3">Hp laptop </h4>
                    </div>
                    <div class="card-overlay bg-gradient"></div>
                </div>
            </div>
        </div>
                      
        @yield('content')

        <a href="#" data-toggle-theme-switch>
            <div class="card card-style">
                <div class="d-flex pt-3 mt-1 mb-2 pb-2">
                    <div class="align-self-center">
                        <i class="color-icon-gray color-gray-dark font-30 icon-40 text-center fa fa-moon ml-3 show-on-theme-light"></i>
                        <i class="color-icon-yellow color-yellow-dark font-30 icon-40 text-center fa fa-sun ml-3 show-on-theme-dark"></i>
                    </div>
                    <div class="align-self-center">
                        <p class="pl-2 ml-1 color-highlight font-500 mb-n1 mt-n1">Tap to Enable</p>
                        <h4 class="show-on-theme-light pl-2 ml-1 mb-0">Dark Mode</h4>
                        <h4 class="show-on-theme-dark pl-2 ml-1 mb-0">Light Mode</h4>
                    </div>
                    <div class="ml-auto align-self-center">
                        <div class="custom-control ios-switch mr-5 pr-2 mt-n2">
                            <input type="checkbox" class="ios-input" id="toggle-dark-switch">
                            <label class="custom-control-label" for="toggle-dark-switch"></label>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        
        <div data-menu-load="menu-footer.html"></div>
    </div>
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="{{ route('menu-main') }}" data-menu-width="280" data-menu-active="nav-welcome"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="{{ route('menu-share') }}" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
    
    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m"
        data-menu-height="400" 
        data-menu-effect="menu-parallax">
        <img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
        <h4 class="text-center mt-4 mb-2">Appkit on your Home Screen</h4>
        <p class="text-center boxed-text-xl">
            Install Appkit on your home screen, and access it just like a regular app. It really is that simple!
        </p>
        <div class="boxed-text-l">
            <a href="#" class="pwa-install btn-center-l btn btn-m font-600 gradient-highlight rounded-sm">Add to Home Screen</a>
            <a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12">Maybe later</a>
        </div>
    </div>   

    <!-- Install instructions for iOS -->
    <div id="menu-install-pwa-ios" 
        class="menu menu-box-bottom rounded-m"
        data-menu-height="360" 
        data-menu-effect="menu-parallax">
        <div class="boxed-text-xl top-25">
            <img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
            <h4 class="text-center mt-4 mb-2">Appkit on your Home Screen</h4>
            <p class="text-center ml-3 mr-3">
                Install Appkit on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <a href="#" class="pwa-dismiss close-menu btn-full mt-3 text-center text-uppercase font-900 color-red-light opacity-90 font-110">Maybe later</a>
        </div>
    </div>   

    
</div>

<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
</html>
