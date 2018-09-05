@extends('layouts.app')

@section('content')
    <header id="header" class="media">
        <div class="pull-left h-logo">
            <a href="{{ url('/') }}" class="hidden-xs">{{ config('app.name', 'Web Reputation') }} <small>&nbsp;</small>
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

            <li class="hm-alerts" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                <a href=""><i class="hm-icon zmdi zmdi-notifications"></i></a>
            </li>
            <li class="dropdown hm-profile">
                <a data-toggle="dropdown" href="">
                    <div class="avatar-char palette-Light-Blue bg">{{str_limit(\Auth::user()->name,2,'')}}</div>
                </a>

                <ul class="dropdown-menu pull-right dm-icon">
                    <li>
                        <a href="{{ route('settings.index') }}"><i class="zmdi zmdi-settings"></i> Impostazioni</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="zmdi zmdi-time-restore"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="media-body h-search">
            <form class="p-relative" role="search">
                <input  type="search" name="q" autocomplete="off" class="hs-input search-input" placeholder="Cerca fra i clienti">
                <i class="zmdi zmdi-search hs-reset" data-ma-action="search-clear"></i>
            </form>
        </div>
    </header>
<section id="main">
    @include('layouts.menu')
    <section id="content">
        @yield('main-content')
        @include('layouts.footer')
    </section>
</section>
    @endsection


    <script type="text/javascript">

    </script>
