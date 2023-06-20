<!--==================================================-->
    <!----- Start Techno Main Menu Area ----->
    <!--==================================================-->
    <div id="sticky-header" class="techno_nav_manu transparent_menu white d-md-none d-lg-block d-sm-none d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo mt-4">
                        <a class="logo_img" href="{{route('home')}}" title="TakeMyITClass">
                            <img src="{{asset('frontendIT/assets/images/fav-icon/logo.jpg')}}" size="56x56" alt="" />
                        </a>
                        <a class="main_sticky" href="{{route('home')}}" title="TakeMyITClass">
                            <img src="{{asset('frontendIT/assets/images/fav-icon/logo-white.jpg')}}" alt="astute" />
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <nav class="techno_menu">
                        <ul class="nav_scroll">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('home')}}#about">about</a></li>
                            <li><a href="{{route('home')}}#services">Service</a></li>
                            <li><a href="{{route('home')}}#how-it-works">How it Works</a></li>
                            <li><a href="{{route('home')}}#portfolio">Portfolio</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                        <div class="donate-btn-header">
                            <a class="dtbtn" href="{{ route('login') }}">Login</a>
                        </div>
                        <div class="donate-btn-header">
                            <a class="dtbtn-register" href="{{ route('register') }}">Register</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!----- Techno Mobile Menu Area ----->
    <div class="mobile-menu-area d-sm-block d-md-block d-lg-none ">
        <div class="mobile-menu">
            <nav class="techno_menu">
                <ul class="nav_scroll">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}#about">about</a></li>
                    <li><a href="{{route('home')}}#services">Service</a></li>
                    <li><a href="{{route('home')}}#how-it-works">How it Works</a></li>
                    <li><a href="{{route('home')}}#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--==================================================-->
    <!----- End Techno Main Menu Area ----->
    <!--==================================================-->
