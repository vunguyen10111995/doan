@extends('sites.master')
<style>
    .navbar-brand {
        background-image: url('http://dongphongquangninh.com/wp-content/uploads/2017/06/big-sale.gif')!important;
    }
</style>
@section('style')
    {{ Html::style('css/profile_home.css')}}
@endsection

@section('content')

<section>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top nav-header" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown singleDrop active ">
                                <a href="{{ route('home') }}">{{ trans('site.home') }}</a>
                            </li>
                            <li class="dropdown megaDropMenu ">
                                <a href="{{ route('topsale.index') }}">TOP SALE</a>
                            </li>
                            <li class="dropdown megaDropMenu ">
                                <a href="{{ route('food.drink') }}">FOOD & DRINK</a>
                            </li>
                            <li class="dropdown megaDropMenu ">
                                <a href="{{ route('clothes') }}">CLOTHES</a>
                            </li>
                            <li class="dropdown megaDropMenu ">
                                <a href="{{ route('beauty') }}">BEAUTY</a>
                            </li>
                    @if (Auth::guest())
                        <li class="dropdown singleDrop ">
                            <a href="" data-toggle="modal" data-target="#register">{{ trans('register') }}</a>
                        </li>
                        <li class="dropdown singleDrop ">
                            <a href="" data-toggle="modal" data-target="#login">{{ trans('login') }}</a>
                        </li>
                    @else    
                        <li class="dropdown singleDrop active">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->full_name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class=""><a href="{{ route('user.dashboard', Auth::user()->id) }}">{{ trans('site.dashboard') }}</a></li>
                                <li class=""><a href="{{ route('user.profile') }}">{{ trans('site.profile') }}</a></li>
                                <li class=""><a href="{{ route('user.request') }}">{{ trans('site.request_services') }}</a></li>
                                <li class="">
                                    <a href="{{ route('logout') }}">
                                        <form action="{{ route('logout') }}" method="POST">
                                            {{ csrf_field() }}
                                        </form>
                                        {{ trans('site.logout') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif 
                </ul>
            </div>
        </div>
    </nav>
</section>
<!-- DASHBOARD MENU  -->
<section class="dashboardMenu">
    <nav class="navbar dashboradNav">
        <div class="container">
            <div class="dashboardNavRight">
                <ul class="NavRight">
                    <li class="dropdown singleDrop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->avatar }}" alt=""><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                        <ul class="dropdown-menu dropdownMenu">
                            <li>
                                <a href="{{ route('user.profile') }}">
                                    <h5>{{ trans('site.profile') }}</h5>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.setting') }}">
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
                    <li><a class="active" href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ trans('site.profile') }}</a></li>
                    <li><a href="{{ route('user.setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>{{ trans('site.setting') }}</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</section>
<section class="profileSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="profileImg" id="image_display">
                    <img id="image" src="{{ Auth::user()->avatar }}" width="360" height="437">
                    <a href="" id="mask" class="btn btn-info btn-lg" data-toggle="modal" data-target="#changeAvatar"><i class="fa fa-camera" aria-hidden="true"></i><span> {{ trans('site.change_avatar') }}</span></a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="profileContent">
                    <div class="editIconRight clearfix">
                        @if(Auth::user()->id)
                            <a data-toggle="modal" data-target="#updateProfile"><i class="fa fa-cog" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    <div class="profileTitle">
                        <h2>{{ Auth::user()->full_name }}</h2>
                        <p>
                            <strong>
                                @if(Auth::user()->admin_access == 1)
                                {{ trans('site.account') }}:
                                    <span>{{ trans('site.admin') }}</span>
                                @endif
                            </strong>
                        </p>
                    </div>
                    <div class="profileInfo">
                        <p><strong>{{ trans('site.full_name') }}: </strong> {{ Auth::user()->full_name }}</p>
                        <p>
                            <strong>
                                {{ trans('site.account') }}:
                                @if(Auth::user()->gender == 0)
                                    <span>{{ trans('site.male') }}</span>
                                @endif
                                @if(Auth::user()->gender == 1)
                                    <span>{{ trans('female') }}</span>
                                @endif
                            </strong>
                        </p>
                        <p><strong>{{ trans('site.phone') }}: </strong>{{ Auth::user()->phone }}</p>
                        <p><strong>{{ trans('site.address') }}: </strong>{{ Auth::user()->address }}</p>
                        <p><strong>{{ trans('site.email') }}: </strong> {{ Auth::user()->email }}</p>
                    </div>
                    <div class="profileSocialIcon">
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT YOU SECTION -->
<section class="aboutYouSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ trans('site.about_you') }}</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. sintoccaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
            </div>
        </div>
    </div>
</section>
<!--Modal update avatar-->
<div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.change_avatar') }}</h4>
            </div>
            <form action="{{ route('user.changeAvatar', Auth::user()->id) }}" id="upload_form" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="file" id="file" name="avatar">
                    <div id="image_display">
                        <img src="" id="image_update" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{ trans('site.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal update profile-->
<div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.update_profile') }}</h4>
            </div>
            <form action="{{ route('user.updateProfile', Auth::user()->id) }}" id="upload_form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ trans('site.avatar') }}</label>
                        <input type="file" id="file" name="avatar">
                        @if($errors->has('avatar'))
                            <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{ trans('site.full_name') }}</label>
                        <input type="text" name="full_name" class="form-control" value="{{ Auth::user()->full_name }}" placeholder="{{ trans('site.full_name') }}">
                        @if($errors->has('full_name'))
                            <span class="help-block">{{ $errors->first('full_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{ trans('address') }}</label>
                        <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}" placeholder="{{ trans('site.address') }}">
                        @if($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{ trans('site.gender') }}</label>
                        <select name="gender" class="form-control">
                            <option disabled>
                                @if(Auth::user()->gender == 0) {{ trans('site.male') }}
                                @else {{ trans('site.female') }}
                                @endif
                            </option>
                            <option value="0">{{ trans('site.male') }}</option>
                            <option value="1">{{ trans('site.female') }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>{{ trans('site.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    {{ Html::script('js/profile-home.js') }}
@endsection
