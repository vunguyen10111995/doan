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
    {{ Html::style('bowers/toastr/toastr.css')}}
@endsection

@section('script')
    {{ Html::script('bowers/select2/dist/js/select2.full.min.js') }}
    {{ Html::script('/bowers/moment/min/moment.min.js') }}
    {{ Html::script('/bowers/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/list_fork.js') }}
    {{ Html::script('js/dashboard.js') }} 
    {{ Html::script('js/follow.js') }}
    {{ Html::script('bowers/toastr/toastr.js') }}   
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
<div class="user-profile-wrapper">
    <div class="user-header">
        <div class="content">
            <div class="content-top">
                <div class="container">
                    <div class="inner-top">
                        <div class="image">
                            <img src="{{ $user->avatar }}" alt="image">
                        </div>
                        <div class="GridLex-gap-20">
                            <div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">
                                <div class="GridLex-col-7_sm-12_xs-12_xss-12">
                                    <div class="GridLex-inner">
                                        <div class="heading clearfix">
                                            <h3>{{ $user->full_name }}</h3>
                                            @if($user->admin_access == 1)
                                                <span class="label label-info">
                                                    <i class="fa fa-check mr-3"></i> 
                                                    Admin
                                                </span>
                                            @else
                                                <span class="label label-success">
                                                    <i class="fa fa-trophy mr-3"></i> 
                                                    Guest
                                                </span>    
                                            @endif
                                        </div>
                                        <ul class="user-meta">
                                        <li><i class="fa fa-map-marker"></i> {{ $user->address }} <span class="mh-5 text-muted">|</span> <i class="fa fa-phone"></i> {{ $user->phone }}</li>
                                            <li>
                                                <div class="dashboardSocialIcon">
                                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true" title="facebook"></i></a>
                                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true" title="twitter"></i></a>
                                                    <a href="#"><i class="fa fa-rss" aria-hidden="true" title="rss"></i></a>
                                                    <a href="#"><i class="fa fa-vimeo" aria-hidden="true" title="vimeo"></i></a>
                                                </div>
                                                <div id="follow-result">
                                                    @if(Auth::user()->id != $user->id)
                                                        @if($checkFollow)
                                                            <button type="button" class="btn btn-xs btn-border" userId="{{ $user->id }}" id="unfollow"><span>{{ trans('site.unfollow') }}</span></button>
                                                        @else
                                                            <button type="button" class="btn btn-xs btn-border" userId="{{ $user->id }}" id="follow"><span>{{ trans('site.follow') }}</span></button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="GridLex-col-5_sm-12_xs-12_xss-12">   
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($user->id == Auth::user()->id)
            <div class="content-bottom">
                <div class="container">
                    <div class="inner-bottom">
                        <ul class="user-header-menu">
                                <li class="active"><a href="{{ route('user.dashboard', Auth::user()->id) }}"> SERVICE <span>{{ $numberService }}</span></a></li>
                                <li><a href="" id="show-gallery">{{ trans('site.gallery') }}</a></li>
                                <li><a href="" data-toggle="modal" data-target="#following">{{ trans('site.followings') }} <span>{{ $following }}</span></a></li>
                                <li><a href="" data-toggle="modal" data-target="#follower">{{ trans('site.followers') }} <span>{{ $follower }}</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="content-dashboard">
        <div class="col-md-12" id="show_info">
            <h4 class="h4-plan"><i class="fa fa-calendar" aria-hidden="true"></i> MY SERVICE</h4>
            @if($user->id == Auth::user()->id)
                <a href="{{ route('request.service.user') }}"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Add Service </span></a>
            @endif
            <hr>
            @foreach($services as $service)
                @if(count($services))
                    <div id="plan-detail">
                        <table id="table-plan">
                            <tr>
                                <td>{{ trans('site.status') }}: &nbsp;  </td> 
                                <td>
                                    <span style="color:red">{{ ($service->status == 'pending') ? ' Pending' : ' Approved' }}</span>
                                </td>
                            </tr>
                        </table>
                        <div>
                            <a href="{{ route('user.view.address', $service->id) }}" class="content-plan">
                                
                                <div class="tile">
                                    <div class="text">
                                        {{ $service->title }}
                                        <h5 class="animate-text">
                                            {{ trans('site.start_at') }}:
                                            {{ $service->sale_from }}
                                            <br>
                                            {{ trans('site.end_at') }}:
                                            {{ $service->sale_end }}
                                        </h5>
                                    </div>
                                    <div class="create-schedule">View Detail</div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>  
</div>
<!-- Followings -->
<div class="modal fade" id="following" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('site.close') }}</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.followings') }}</h4>
            </div>
            <div class="modal-body">
                @foreach($userFollowers as $follower)
                    <div class="content-follow">
                        <a href="{{ route('user.dashboard', ['id' => $follower->followingUser->id]) }}"><img src="{{ $follower->followingUser->avatar }}" class="img-circle" width="50" height="50"></a>
                        <a href="{{ route('user.dashboard', ['id' => $follower->followingUser->id]) }}">
                            {{ $follower->followingUser->full_name }}
                        </a>
                   </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Followers -->
<div class="modal fade" id="follower" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">{{ trans('site.close') }}</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('site.followers') }}</h4>
            </div>
            <div class="modal-body"> 
                @foreach($userFollowings as $following)
                    <div class="content-follow">
                        <a href="{{ route('user.dashboard', ['id' => $following->followerUser->id]) }}"><img src="{{ $following->followerUser->avatar }}" class="img-circle" width="50" height="50"></a>
                        <a href="{{ route('user.dashboard', ['id' => $following->followerUser->id]) }}">
                            {{ $following->followerUser->full_name }}
                        </a>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
