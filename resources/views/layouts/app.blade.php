<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TakeMyITClass</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="background-image: url(frontendIT/assets/images/slider/slider-2.png);background-size: cover;background-position: center center;background-repeat: no-repeat;height: 900px;">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   TakeMyITClass
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style>
        #whatsAppLink {
            position: fixed;
            z-index: 9999;
            float: left;
            left: 1.3em;
            top: 91%;
            margin-top: -25px;
            cursor: pointer;
            min-width: 50px;
            max-width: 240px;
            color: #fff;
            text-align: center;
            padding: 12px 21px;
            margin: 0 auto 0 auto;
            background: #20B038;
            -webkit-transition: All 0.5s ease;
            -moz-transition: All 0.5s ease;
            -o-transition: All 0.5s ease;
            -ms-transition: All 0.5s ease;
            transition: All 0.5s ease;
            border-radius: 50px;
        }
        @media(max-width: 768px){
            .visible-xs{
                display: block;
            }
            .visible-lg{
                display: none;
            }
        }
        @media(min-width: 768px){
            .visible-xs{
                display: none;
            }
            .visible-lg{
                display: inline-block;
            }
        }
        strong{
            color: #13425f !important;
        }
    </style>
    <!--==================================================-->
    <!----- End Techno Footer Middle Area ----->
    <!--==================================================-->
    <a class="visible-lg" id="whatsAppLink" href="https://web.whatsapp.com/send?phone=254708444398&amp;text=Hello, I need some help with my online course"  target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>

    <a class="visible-xs" id="whatsAppLink" href="https://api.whatsapp.com/send?phone=254708444398&amp;text=Hello, I need some help with my online course"  target="_blank">
        <i class="fa fa-whatsapp"></i>&nbsp;&nbsp; WhatsApp Us
    </a>
    <script>
        $('.delete-user').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
    <!--<script src="//code.tidio.co/odd0ytvu6qwx3o4gjr8j44w4ogftxlzr.js" async></script>-->
<!--Add the following script at the bottom of the web page (before </body></html>)-->
<script type="text/javascript">function add_chatinline(){var hccid=47676652;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline();</script>
</body>
</html>
