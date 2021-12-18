<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Gestão Escolar</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">GE</a>
        </div>
        <ul class="sidebar-menu">
            @foreach(menuList()->toArray() as $menu)
                <li class="menu-header">{{$menu['menu-header']}}</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown">
                        <i class="fas fa-fire"></i><span>{{$menu['dropdown']['nav-link']}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($menu['dropdown']['dropdown-menu'] as $navLink)
                            <li>
                                <a class="nav-link" href="{{ route($navLink['routeName']) }}">
                                    {{$navLink['menuLink']}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
