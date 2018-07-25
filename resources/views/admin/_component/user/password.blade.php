@extends('admin.master')

@section('title')
    {{ trans('admin.change_password') }}
@endsection

@section('script')
    {{ Html::script('js/profile_admin.js') }}
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ trans('admin.change_password') }}</h2>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal', 'route' => ['admin.change.password', $user->id]]) !!}
                <div class="form-group">
                    <label>{{ trans('admin.new_password') }}</label>
                    <input type="password" id="new_password" value="" class="form-control" name="new_password">
                </div>
                <div class="form-group">
                    <label>{{ trans('admin.re_new_password') }}</label>
                    <input type="password" id="re_new_password" value="" class="form-control" name="re_new_password">
                </div>
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @if(Session::has('message'))
                    <p id="message">{{ Session::get('message') }}</p>
                @endif
                <div class="buttonUpdate">
                    {!! Form::submit('Update', ['class' => 'btn btn-success updatepassword']) !!}
                </div>
                <input type="hidden" name="hidden" class="hidden_id" value="{{ $user->id }}">
            {!! Form::close() !!}
        </div>
@endsection
