    <aside id="s-main-menu" class="sidebar" style="margin-top: 10.8rem;">
        <ul class="main-menu">
            <li>
                <a href="{{route('clients.index')}}"><i class="zmdi zmdi-assignment-account zmdi-hc-fw"></i> Clienti</a>
            </li>
            @if(\Auth::user()->isAdmin())
            <li>
                <a href="{{route('lawyers.index')}}"><i class="zmdi zmdi-case zmdi-hc-fw"></i> Avvocati</a>
            </li>
            @endif
        </ul>
    </aside>


