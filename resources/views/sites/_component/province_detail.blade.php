@extends('sites.master')
<style>
    .navbar-brand {
        background-image: url('http://dongphongquangninh.com/wp-content/uploads/2017/06/big-sale.gif')!important;
    }
</style>
@section('content')

<section class="bannercontainer">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
           <ul>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites/home/slider/slider-01.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-02.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites//home/slider/slider-03.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-04.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
            </ul>
        </div>
    </div>
</section>
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.details') }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 isotopeSelector asia">
                <article class="">
                    <figure>
                        <img src="{{ $province->image }}" alt="" height="300px">

                        <h4>{{ $province->name }}</h4>
                        <div class="overlay-background">
                            <div class="inner"></div>
                        </div>
                    </figure>
                </article>
            </div>
            <div class="col-sm-8">
                {!! Form::label('description', trans('site.description')) !!}
                <div class="form-group">
                    {!! Form::textarea('description', $province->description, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
