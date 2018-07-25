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
<!-- TOP DEALS -->
<section class="mainContentSection packagesSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span class="lightBg">Clothes</span></h2>
                </div>
            </div>
        </div>
            @foreach($services as $service)
                <div class="col-sm-4 col-xs-12">
                    <div class="thumbnail deals">
                        <img src="{{ $service->image }}" alt="deal-image">
                        <a href="{{ route('service.detail', $service->id) }}" class="pageLink"></a>
                        <div class="discountInfo">
                            <div class="discountOffer">
                                <h4>
                                    {{ $service->sale_percent }}% <span>OFF</span>
                                </h4>
                            </div>
                        </div>
                        <div class="caption">
                        <h4><a href="{{ route('service.detail', $service->id) }}" class="captionTitle">{{ $service->title }}</a></h4>
                            <p>{{ $service->description }}</p>
                            <span>Sale On: {{ $service->sale_from }} - {{ $service->sale_end }}</span>
                            <div class="detailsInfo">
                                <ul class="list-inline detailsBtn">
                                    <li><a href="{{ $service->url }}" class="btn buttonTransparent">Book Now</a></li>
                                    <li><a href="{{ route('service.detail', $service->id) }}" class="btn buttonTransparent">{{ trans('site.details') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    <center>
        <div class="show-more">
            {{ $services->links() }}
        </div>
    </center>
</section>

<!-- COUNTING PARALLAX -->
<section class="countUpSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $total_service }}</div>
                    <h5>{{ trans('site.total_service') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $total_address }}</div>
                    <h5>{{ trans('site.total_address') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $total_category }}</div>
                    <h5>{{ trans('site.total_category') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                    </div>
                    <div class="counter">24</div>
                    <h5>{{ trans('site.hours_support') }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
@section('script')
    {{ Html::script('bowers/toastr/toastr.js') }}
    {{ Html::script('js/index.js') }}
@endsection
