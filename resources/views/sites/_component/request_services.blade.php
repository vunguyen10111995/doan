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
                                <li class=""><a href="{{ route('request.service.user') }}">Request Service</a></li>
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
        <h2>{{ trans('site.services_request') }}</h2>
        <hr>
        <span></span>
    </div>
    <div class="centeredDiv">
        <h4>{{ trans('site.tell_us') }}</h4>
        <hr>
        <form action="{{ route('user.storeRequest') }}" method="POST" enctype="multipart/form-data">
            @if ($errors)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group" id="profile_pic">
                <label>{{ trans('site.image') }}</label> &nbsp;
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                <div class="profileImg img-request" id="image_display">
                    <img id="image_update" class="thumbnail img-request" width="360" height="437">
                </div>
                <input type="file" name="image" id="file" onclick="showImage();" >
            </div>
            <div class="form-group">
                <label>Please Enter Service Title</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="title" required autocomplete="off"
                    placeholder="Please Enter Service Title"/>
            </div>
            <div class="form-group">
                <label>{{ trans('site.service_category') }}</label> &nbsp;
                <i class="fa fa-location-arrow"></i>
                <select name="category_id" class="form-control" id="category" required>
                    <option disabled selected value>{{ trans('site.select_service_category') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="opentime">
                <label>Sale From</label> &nbsp;
                <i class="fa fa-clock-o"></i>
                <input type='date' name="sale_from" class="form-control" placeholder="DD/MM/YY" value=""/>
            </div>
            <div class="form-group" id="closetime">
                <label>Sale End</label> &nbsp;
                <i class="fa fa-clock-o"></i>
                <input type="date" name="sale_end" required class="form-control" placeholder="DD/MM/YY">
            </div>
            <div class="form-group">
                <label>Please Enter Sale Percent</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="sale_percent" required autocomplete="off"
                    placeholder="Please Enter Sale Percent"/>
            </div>
            <div class="form-group">
                <label>Please Enter Description</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="description" required autocomplete="off"
                    placeholder="Please Enter Description"/>
            </div>
            <div class="form-group">
                <label>Enter Note</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="note" required autocomplete="off"
                    placeholder="Please Enter Description"/>
            </div>
            <div class="form-group">
                <label>Please Enter Link</label> &nbsp;
                <i class="fa fa-commenting-o"></i>
                <input class="form-control" name="url" required autocomplete="off"
                    placeholder="Please Enter URL"/>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                    <input type="checkbox"
                        onchange="document.getElementById('btnt').disabled = !this.checked"/>
                    {{ trans('site.agree_f') }}
                    <a href="#">{{ trans('site.term_condition') }}</a>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn_update" name="btn" id="btnt" disabled>{{ trans('submit') }}</button>
            <button type="reset" class="btn btn-warning">&nbsp; Reset &nbsp;</button>
        </form>
    </div>
    <div class="clearfix"></div>
</div>
@endsection
@section('script')
    {{ Html::script('js/profile-home.js') }}
@endsection
