<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">

</head>
<body data-ma-header="bluegrey">
    <div id="app" >

        <header id="header" class="media">
            <div class="pull-left h-logo">
                <a href="index.html" class="hidden-xs">
                    Material
                    <small>admin extended</small>
                </a>

                <div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
                    <div class="mc-wrap">
                        <div class="mcw-line top palette-White bg"></div>
                        <div class="mcw-line center palette-White bg"></div>
                        <div class="mcw-line bottom palette-White bg"></div>
                    </div>
                </div>
            </div>

            <ul class="pull-right h-menu">
                <li class="hm-search-trigger">
                    <a href="" data-ma-action="search-open">
                        <i class="hm-icon zmdi zmdi-search"></i>
                    </a>
                </li>

                <li class="dropdown hidden-xs hidden-sm h-apps">
                    <a data-toggle="dropdown" href="">
                        <i class="hm-icon zmdi zmdi-apps"></i>
                    </a>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="">
                                <i class="palette-Red-400 bg zmdi zmdi-calendar"></i>
                                <small>Calendar</small>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <i class="palette-Green-400 bg zmdi zmdi-file-text"></i>
                                <small>Files</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="palette-Light-Blue bg zmdi zmdi-email"></i>
                                <small>Mail</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="palette-Orange-400 bg zmdi zmdi-trending-up"></i>
                                <small>Analytics</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="palette-Purple-300 bg zmdi zmdi-view-headline"></i>
                                <small>News</small>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="palette-Blue-Grey bg zmdi zmdi-image"></i>
                                <small>Gallery</small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown hidden-xs">
                    <a data-toggle="dropdown" href=""><i class="hm-icon zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dm-icon pull-right">
                        <li class="hidden-xs">
                            <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i> Toggle Fullscreen</a>
                        </li>
                        <li>
                            <a data-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i> Clear Local Storage</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-face"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Other Settings</a>
                        </li>
                    </ul>
                </li>
                <li class="hm-alerts" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                    <a href=""><i class="hm-icon zmdi zmdi-notifications"></i></a>
                </li>
                <li class="dropdown hm-profile">
                    <a data-toggle="dropdown" href="">
                        <img src="img/profile-pics/1.jpg" alt="">
                    </a>

                    <ul class="dropdown-menu pull-right dm-icon">
                        <li>
                            <a href="profile-about.html"><i class="zmdi zmdi-account"></i> View Profile</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-input-antenna"></i> Privacy Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-settings"></i> Settings</a>
                        </li>
                        <li>
                            <a href=""><i class="zmdi zmdi-time-restore"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="media-body h-search">
                <form class="p-relative">
                    <input type="text" class="hs-input" placeholder="Search for people, files &amp; reports">
                    <i class="zmdi zmdi-search hs-reset" data-ma-action="search-clear"></i>
                </form>
            </div>

        </header>



        <nav class="navbar navbar-default navbar-static-top" style="display: none">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Cyberlex') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
