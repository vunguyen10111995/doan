@extends('sites.master')

@section('style')
<style>
    .navbar-brand {
        background-image: url('http://dongphongquangninh.com/wp-content/uploads/2017/06/big-sale.gif')!important;
    }
</style>
    {{ Html::style('bowers/toastr/toastr.css')}}
@endsection

@section('content')

<section class="banner">
    <div>
        <img src="https://img.jamja.vn/jamja-prod/gcs_full_jamja-foodhouse-web-banner-large-leaderboard-2x-2280x282-2018-06-19-060906.png" alt="">
    </div>
</section>
<!-- DASHBOARD MENU  -->
<section class="dashboardMenu">
    <nav class="navbar dashboradNav">
        <div class="container">
            <div class="dashboardNavRight">
                <ul class="NavRight">
                    <li class="dropdown singleDrop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/avatar.png') }}" alt=""><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdownMenu">
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <h5>{{ trans('site.profile') }}</h5>
                                </a>
                            </li>
                            <li><a href="{{ route('user.setting') }}">
                                <h5>{{ trans('site.setting') }}</h5>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <h5>{{ trans('site.logout') }}</h5>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav dashboardNavLeft">
                        <li><a href="{{ route('user.dashboard', Auth::user()->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{ trans('site.dashboard') }}</a></li>
                        <li><a href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ trans('site.profile') }}</a></li>
                        <li><a class="active" href="{{ route('user.setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>{{ trans('site.setting') }}</a></li>                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</section>
<!-- ACCOUNT SETTINGS SECTION -->
<section class="settingSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="settingContent bg-ash">
                    <h4>{{ trans('site.setting') }}</h4>
                    <!-- Change Password -->
                    <div class="changePassword">
                        <p>{{ trans('site.change_password') }}</p>
                        <div class="row">
                            <form action="{{ route('user.changePassword', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-12">
                                    <input type="password" name="password" class="form-control" placeholder="{{ trans('site.old_password') }}">
                                    @if($errors->has('password'))
                                        <span class="help-block">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <input type="password" name="password_register" class="form-control" placeholder="{{ trans('site.password_register') }}">
                                    @if($errors->has('password_register'))
                                        <span class="help-block">{{ $errors->first('password_register') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <input type="password" name="password_confirm" class="form-control" placeholder="{{ trans('site.password_confirm') }}">
                                    @if($errors->has('password_confirm'))
                                        <span class="help-block">{{ $errors->first('password_confirm') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn buttonTransparent">{{ trans('update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <!-- Change Password -->
                    <div class="changeEmail">
                        <p>{{ trans('site.change_email') }}</p>
                        <div class="row">
                            <form action="{{ route('user.changeEmail', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="{{ trans('site.old_email') }}">
                                    @if($errors->has('email'))
                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="new_email" id="new_email" placeholder="{{ trans('site.new_email') }}">
                                    @if($errors->has('new_email'))
                                        <span class="help-block">{{ $errors->first('new_email') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" name="email_confirm" id="email_confirm" placeholder="Confirm New Email">
                                    @if($errors->has('email_confirm'))
                                        <span class="help-block">{{ $errors->first('email_confirm') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn buttonTransparent">{{ trans('site.update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
