@extends('admin.master')

@section('title')
    {{ trans('admin.welcome_admin') }}
@endsection

@section('content')
    <div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">{{ trans('admin.today') }}</span>
                    <h5>Number Category</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $numberCategory }}</h1>
                    <div class="stat-percent font-bold text-success"><i class="fa fa-bolt"></i></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">{{ trans('admin.today') }}</span>
                    <h5>Number Address</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $numberAddress }}</h1>
                    <div class="stat-percent font-bold text-info"><i class="fa fa-level-up"></i></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right"></span>
                    <h5>{{ trans('admin.service') }}</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $numberService }}</h1>
                    <div class="stat-percent font-bold text-danger"><i class="fa fa-level-down"></i></div>
                    <small></small>
                </div>
            </div>
        </div>
    </div>
    <div class="container ahuhu">
        
    </div>
@endsection
