<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>  <span class="label label-primary"></span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="{{ route('admin.user.index') }}">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> {{ trans('admin.you_have_user', ['many' => 123] ) }}
                                <span class="pull-right text-muted small"></span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin.service.index') }}">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> {{ trans('admin.you_have_plan', ['many' => 456] ) }}
                                <span class="pull-right text-muted small"></span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('admin.request.service') }}">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> {{ trans('admin.you_have_rq', ['many' => 122] ) }}
                                <span class="pull-right text-muted small"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">{{ trans('admin.welcome', ['name' => Auth::user()->full_name ]) }}</span>
            </li>
            <li>
                <a href="{{ route('logout') }}">
                <i class="fa fa-sign-out"></i> {{ trans('admin.logout') }}
                </a>
            </li>
        </ul>
    </nav>
</div>
