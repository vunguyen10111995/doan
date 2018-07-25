<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ Auth::user()->avatar }}" height="80px" width="80px" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{ Auth::user()->full_name }}
                                </strong>
                            </span> 
                            <span class="text-muted text-xs block">{{ trans('admin.admin') }} 
                                <b class="caret"></b>
                            </span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="{{ route('admin.profile', Auth::user()->id ) }}">{{ trans('admin.profile') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('admin.get.password', Auth::user()->id) }}">{{ trans('admin.change_password') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}">{{ trans('admin.logout') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_user') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}"><i class="fa fa-pie-chart"></i> <span class="nav-label">{{ trans('admin.manage_category') }}</span>  </a>
            </li>
            <li>
                <a href="{{ route('admin.service.index') }}"><i class="fa fa-star"></i> <span class="nav-label">Service</span></a>
            </li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-star"></i> <span class="nav-label">{{ trans('admin.goto_index') }}</span></a>
            </li>
        </ul>
    </div>
</nav>
