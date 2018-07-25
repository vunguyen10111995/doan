@extends('sites.master')

@section('style')
<style>
        .navbar-brand {
            background-image: url('http://dongphongquangninh.com/wp-content/uploads/2017/06/big-sale.gif')!important;
        }
    </style>
    {{ Html::style('css/plan_detail.css') }}
    {{ Html::style('bowers/toastr/toastr.css')}}
@endsection()

@section('content')
<section class="banner">
        <div>
            <img src="https://img.jamja.vn/jamja-prod/gcs_full_jamja-foodhouse-web-banner-large-leaderboard-2x-2280x282-2018-06-19-060906.png" alt="">
        </div>
    </section>
<br>
    <section class="container">
        <div id="detail-plan">
            <div clas="detail-content" id="detail-content">
                <div class="clearfix">
                    <div class="col-md-5">
                        <div>
                            <img src="{{ asset($service->image)}}" width="320px" height="200px"/>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h1 class="detail-title">{{ $service->title }}</h1>
                            <span class="author">Post By:</span>
                            <span> 
                                {{ $service->user->full_name}}
                            </span>
                        </p>
                        <div class="detail-content-1">
                            <p>{{ $service->description }}</p>
                        </div>
                        <div class="detail-content-under">
                            <div class="detail-bot">
                                <p>
                                    <span>{{ trans('site.time') }}:</span>
                                    <span>{{ $service->sale_from }} - {{ $service->sale_end }}</span>
                                </p>
                            </div>
                            <div class="detail">
                                <p>
                                    <a href="{{ $service->url }}" class="btn buttonTransparent" style="margin-left:100px">BOOK NOW</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="detail" id="tab-plan">
                        <ul class="nav nav-tabs" role="tablist" class="active">
                            <li role="presentation">
                                <a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">Address</a>
                            </li>
                            
                            <li role="presentation">
                                <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab" >{{ trans('site.comment') }}</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane" id="itinerary">
                                <div id="framgia-schedule" class="tab-pane fade in  clearfix active col-md-4">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.194708148045!2d105.79669111444609!3d20.984830786022215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc6bdc7f95f%3A0x58ffc66343a45247!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgR2lhbyB0aMO0bmcgVuG6rW4gdOG6o2k!5e0!3m2!1svi!2s!4v1527875818265" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>                                </div>
                                <div class="col-md-8"><ul>
                                        @foreach($address as $addr)
                                            <li style="">Address {{ $addr->name_address }}</li>
                                            <p>Phone: {{ $addr->telephone }}</p>
                                            <p>Note:{{ $addr->description }}</p>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="comment">
                                @if(Auth::check())
                                <form action="" id="comment-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="text" name="service_id" id="plan_id" value="{{ $service->id }}" data-id="{{ $service->id }}" hidden>
                                    <textarea name="content" class="form-control text-comment"></textarea>
                                    <button type="submit" class="btn buttonTransparent btn-comment">
                                        {{ trans('site.comment') }}
                                    </button>
                                </form>
                                <div class="show-comment"></div>
                                @foreach($comments as $comment)
                                <div class="comment-content">
                                    <div class="col-md-8">
                                        <header class="comment-header" style="border-bottom:1px solid">
                                            <p class="comment-author">
                                                <img src="{{ $comment->user->avatar }}" class="img-circle img-comment">
                                            </p>
                                            <p>
                                                <a href="">{{ $comment->user->full_name }}</a><span> {{ trans('site.say') }}:</span>
                                            </p>
                                            <p>
                                                {{ $comment->created_at }}
                                            </p>
                                            <p class="framgia-content">{{ $comment->content }}</p>
                                        </header>
                                    </div>
                                    <div class="col-md-4">
                                        @if(Auth::user()->id == $comment->user_id)
                                        <div class="dropdown manage-comment">
                                            <span class="dropdown-toggle manage-dropdown" data-toggle="dropdown">...</span>
                                            <ul class="dropdown-menu manage-menu">
                                                <li class="edit">
                                                    <button type="submit" class="btn edit-comment btn-manage" plan-id="{{ $service->id }}" data="{{ $comment->id }}" value="{{ $comment->content }}">
                                                    <i class="fa fa-pencil"></i> 
                                                    {{ trans('site.edit') }}...
                                                    </button>
                                                </li>
                                                <li>
                                                    <form class="delete" action="" method="post" data-id="{{ $comment->id }}"> 
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn delete btn-manage">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('site.delete') }}...
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <p>You need login to comment here!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        


        <div class="framgia-title-type-2 clearfix">
            <h2><span class="framgia-title-lb">SERVICE SAME TYPE</span></h2>
            <p class="framgia-line"></p>
        </div>
        <div class="clearfix more-plan">
            <hr>
            <div class="col-xs-12">
                <div class="relatedProduct">
                    <div class="clearfix">
                        @foreach($service_types as $service)
                        <div class="col-sm-4 col-xs-12" style="margin-top:10px">
                            <div class="relatedItem">
                                <img src="{{ asset($service->image) }} ">
                                <div class="maskingInfo">
                                    <h4></h4>
                                    <p></p>
                                    <a href="{{ route('service.detail', $service->id) }}" class="btn buttonTransparent">{{ trans('site.viewmore') }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('script')
    {{ Html::script('js/comment.js') }}  
    {{ Html::script('js/delete-comment.js') }}  
    {{ Html::script('js/rate.js') }}  
    {{ Html::script('bowers/toastr/toastr.js') }} 
    {{ Html::script('js/index.js') }}
@endsection
