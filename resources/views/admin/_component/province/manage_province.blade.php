@extends('admin.master')

@section('title')
    {{ trans('admin.manage_province') }}
@endsection

@section('script')
    {!! Html::script('js/manage_province.js') !!}
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_province') }}</h2>
    </div>
</div>
<div class="panel-body">
<button class="fa fa-plus btn btn-primary addValue" aria-hidden="true" data-toggle="modal" data-target="#addValue">{{ trans('admin.add') }}</button>
<div class="modal fade" id="addValue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.add') }}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" id="form-1" action="{{ route('admin.province.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">{{ trans('admin.image') }}</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.description') }}</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary createValue">{{ trans('admin.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="search_provinces">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <input type="text" name="search_province" id="search_province" class="form-control" placeholder="Search" value="">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr class="title-provinces">
                                <th>{{ trans('admin.id') }}</th>
                                <th id="name_province">{{ trans('admin.name') }}</th>
                                <th id="name_image">{{ trans('admin.image') }}</th>
                                <th id="name_description">{{ trans('admin.description') }}</th>
                                <th>{{ trans('admin.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($provinces as $province)
                                <tr class="value-provinces {{ $province->id }}" id="value-provinces {{ $province->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $province->name }}</td>
                                    <td>
                                        <img src="{{ $province->image }}" id="image">
                                    </td>
                                    <td>{{ substr($province->description, 0, 20) }}...</td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $province->id }} value="{{ $province->status }}">{{ trans('admin.view') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8">
                                    <ul class="pagination pull-right"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">{{ $provinces->links() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.details')}}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-2" action="{{ route('admin.province.update', $province->id) }}" enctype="multipart/form-data" method="PUT">
                    {{ csrf_field() }}
                    <div>
                        <input type="file" id="file" name="avatar">
                        <div id="image_display">
                            <img src="" id="image" alt="" name="image">
                        </div>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.id') }}</label>
                        <input type="text" class="form-control" id="id" value="" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name" value="" name="name">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.description') }}</label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                        <button type="button" class="btn btn-primary updateValue">{{ trans('admin.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
