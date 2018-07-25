@extends('sites.master')

@section('title')
    {{ trans('site.detail_request_service') }}
@endsection
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
                    <li class="dropdown singleDrop">
                        <a href="{{ route('home') }}">{{ trans('site.home') }}</a>
                    </li>
                    <li class="dropdown megaDropMenu ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" aria-expanded="false">{{ trans('site.provinces') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.hotels') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.restaurants') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.activities') }}</a>
                    </li>
                    <li class="dropdown singleDrop ">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.guides') }}</a>
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
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('site.admin') }}</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class=""><a href="{{ route('user.dashboard', Auth::user()->id) }}">{{ trans('site.dashboard') }}</a></li>
                                <li class=""><a href="{{ route('user.profile') }}">{{ trans('site.profile') }}</a></li>
                                <li class=""><a href="{{ route('user.plan') }}">{{ trans('site.add_plan') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.request_services') }}</a></li>
                                <li class=""><a href="#">{{ trans('site.booking') }}</a></li>
                                <li class="">
                                    <a href="{{ route('logout') }}">
                                        <form  action="{{ route('logout') }}" method="POST">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('images/avatar.png') }}" alt=""><i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
                    <li><a class="active" href="{{ route('user.dashboard', Auth::user()->id) }}"><i class="fa fa-tachometer" aria-hidden="true"></i>{{ trans('site.dashboard') }}</a></li>
                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user" aria-hidden="true"></i>{{ trans('site.profile') }}</a></li>
                    <li><a href="booking.html"><i class="fa fa-cube" aria-hidden="true"></i>{{ trans('site.booking') }}</a></li>
                    <li><a href="{{ route('user.setting') }}"><i class="fa fa-cogs" aria-hidden="true"></i>{{ trans('site.setting') }}</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</section>
<div class="container content-request">
    <div class="text-center">
        <h2>{{ trans('site.your_services_request') }}</h2>
        <hr>
        <span></span>
    </div>
    <div class="centeredDiv">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group" id="profile_pic">
                <label>{{ trans('site.image') }}</label> &nbsp;
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <div class="profileImg img-request" id="image_display">
                    <img id="" class="thumbnail img-request" width="360" height="437" src="{{ $request_service->image }}">
                </div>
            </div>
            <div class="form-group">
                <label>{{ trans('site.enter_service_name') }}</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="name" required autocomplete="off" value="{{ $request_service->name }}" disabled="" />
            </div>
            <div class="form-group">
                <label>{{ trans('site.service_category') }}</label> &nbsp;
                <i class="fa fa-location-arrow"></i>
                <input type="text" name="category" value="{{ $request_service->category->name }}" class="form-control" disabled="">
            </div>
            <div class="form-group">
                <label>{{ trans('site.province') }}</label> &nbsp;
                <i class="fa fa-map"></i>
                <input type="text" name="province" value="{{ $request_service->province->name }}" class="form-control" disabled="">
            </div>
            <div class="form-group" id="address">
                <label>{{ trans('site.address') }}</label> &nbsp;
                <i class="fa fa-phone"></i>
                <input type="text" name="address" class="form-control" value="{{ $request_service->address }}" disabled="">
            </div>
            <div class="form-group" id="price">
                <label>{{ trans('site.expected_price') }}</label> &nbsp;
                <i class="fa fa-usd"></i>
                <input type="text" name="price" class="form-control" value="{{ $request_service->price }}" disabled="">
            </div>
            <div class="form-group" id="opentime">
                <label>{{ trans('site.open_time') }}</label> &nbsp;
                <i class="fa fa-clock-o"></i>
                <input type="text" name="open_time" required class="form-control form-date" value="{{ $request_service->open_time }}" disabled="">
            </div>
            <div class="form-group" id="status">
                <label>{{ trans('site.status') }}</label> &nbsp;
                <i class="fa fa-plus"></i>
                <input type="text" name="status" class="form-control" value="{{ $request_service->status == 0 ? "Inprogress" : "Approved"  }}" disabled="">
            </div>
        </form>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
@section('script')
    {{ Html::script('js/profile-home.js') }}
@endsection
