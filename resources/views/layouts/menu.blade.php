    <aside id="s-main-menu" class="sidebar" style="margin-top: 10.8rem;">
        <ul class="main-menu">
          @if(\Auth::user()->isAdmin())
            <li>
                <a href="{{route('platforms.index')}}"><i class="zmdi zmdi-view-web zmdi-hc-fw"></i> Platforms</a>
            </li>
            <li>
                <a href="{{route('keywords.index')}}"><i class="zmdi zmdi-info zmdi-hc-fw"></i> Keywords</a>
            </li>
            @endif
        </ul>
    </aside>
