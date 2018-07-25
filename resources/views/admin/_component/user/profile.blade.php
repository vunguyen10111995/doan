@extends('admin.master')

@section('title')
    {{ trans('admin.profile') }}
@endsection

@section('style')
    {!! Html::style('css/profile_admin.css') !!}
@endsection

@section('script')
    {!! Html::script('js/profile_admin.js') !!}
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ trans('admin.profile') }}</h2>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <form class="form-horizontal" action="{{ route('admin.user.update', $admin->id) }}" enctype="multipart/form-data" method="POST" id="form-2">
            {{ csrf_field() }}
                <div class="form-group">
                        <input type="file" id="file" name="avatar">
                        <div id="image_display">
                            <img src="{{ $admin->avatar }}" id="image" alt="" name="image">
                        </div>
                </div>
                <div class="col-md-7 form-group">
                    <label>{{ trans('admin.id') }}</label>
                    <input type="text" value="{{ $admin->id }}" class="form-control" disabled="" id="id">
                </div>
                
                <div class="col-md-7 form-group">
                    <label>Full Name</label>
                    <input type="text" id="full_name" value="{{ $admin->full_name }}" class="form-control" name="full_name">
                </div>
                <div class="col-md-7 form-group">
                    <label>{{ trans('admin.email') }}</label>
                    <input type="text" value="{{ $admin->email }}" class="form-control" id="email" name="email">
                </div>                
                <div class="col-md-7 form-group">
                    <label>{{ trans('admin.address') }}</label>
                    <input type="text" value="{{ $admin->address }}" class="form-control" id="address" name="address">
                </div>
                <div class="form-group col-md-7">
                    <label>{{ trans('admin.gender') }}</label>
                    <select class="form-control gender" id="gender" name="gender" value="{{ $admin->gender }}">
                    </select>
                </div>
                <div class="form-group col-md-7">
                    <label>Phone</label>
                    <input type="text" value="{{ $admin->phone }}" class="form-control" id="phone" name="phone">
                </div>
                    <div class="col-md-1" id="buttonUpdate">
                        <input class="btn btn-success update" type="submit" value="Update">
                    </div>
            </form>
        </div>
@endsection
