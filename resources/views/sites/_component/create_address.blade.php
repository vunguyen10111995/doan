@extends('sites.master')

<style>
    .navbar-brand {
        background-image: url('http://dongphongquangninh.com/wp-content/uploads/2017/06/big-sale.gif')!important;
    }
</style>
@section('style')
    {{ Html::style('css/profile_home.css') }}
    {{ Html::style('bowers/select2/dist/css/select2.min.css') }}
    {{ Html::style('/bowers/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
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
    <div class="page-wrap">
        <div class="container content-request">
            <div class="w3agile-about-section-head text-center">
                <h2 style="margin-top:20px">UPDATE ADDRESS</h2>
                <span></span>
                <hr>
            </div>
            <div class="centeredDiv">
                <h4>{{ trans('site.please_complete') }}</h4>
                <hr>
                <form action="{{ route('address.postAdress', $service->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Title Of Service</label>
                        <i class="fa fa-commenting-o"></i>
                        <input class="form-control" name="title" required autocomplete="off"
                            value="{{ $service->title }}"/>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>{{ trans('site.from') }}</label>
                            <i class="fa fa-calendar"></i>
                            <input type='text' name="start_at" class="form-control datepicker"  value="{{ $service->sale_from }}"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label>{{ trans('site.to') }}</label>
                            <i class="fa fa-calendar"></i>
                            <input type="text" name="end_at" class="form-control datepicker" value="{{ $service->sale_end }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Sale Percent (%)</label>
                            
                            <input type='text' name="sale_percent" class="form-control"  value="{{ $service->sale_percent }}"/>
                        </div>
                        <div class="form-group col-md-10">
                            
                        </div>
                    </div>
                    <div>
                        <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                        </h5>
                        <textarea class="form-control" name="description">{{ $service->description }}</textarea>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12 date">
                            <label>Number Address Of Service</label>
                            <i class="fa fa-calendar"></i>
                            <input name="number_services" type="number" id="number-services" class="form-control" min="0" value="" placeholder="{{ trans('site.please_day') }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <span>
                        <b>Add Address</b>
                        </span>
                        <div class="schedules">
                            <div id="expand">
                                    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox"
                                onchange="document.getElementById('btnt').disabled = !this.checked"/>
                            {{ trans('site.agree_f') }} <a href="#">{{ trans('site.term_condition') }}</a>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn_update" id="btnt" disabled>{{ trans('site.submit') }}</button>
                    <button type="reset" class="btn btn-warning btn_update">{{ trans('site.reset') }}</button>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection

@section('script')
    {{ Html::script('bowers/select2/dist/js/select2.full.min.js') }}
    {{ Html::script('/bowers/moment/min/moment.min.js') }}
    {{ Html::script('/bowers/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/dashboard.js') }}  
@endsection