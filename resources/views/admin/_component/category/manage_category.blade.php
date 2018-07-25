@extends('admin.master')

@section('title')
    {{ trans('admin.manage_category') }}
@endsection

@section('script')
    {!! Html::script('js/manage_category.js') !!}
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_category') }}</h2>
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
                <form class="form-horizontal" method="POST" id="form-1" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary createValue">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row" id="search_categories">
    <div class="col-md-9">        
    </div>
    <div class="col-md-3">
        <input type="text" name="search_category" id="search_category" class="form-control" placeholder="Search" value="">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr class="title-users">
                                <th>ID</th>
                                <th>{{ trans('admin.name') }}</th>
                                <th>UPDATE</th>
                                {{-- <th>DELETE</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="value-categories {{$category->id}}" id="value-categories {{$category->id}}">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $category->id }} value="{{ $category->status }}">Update</a>
                                </td>
                                {{-- <td>
                                    <a type="button" class="btn btn-primary btn-sm delete_category" data-toggle="modal" data-id="{{ $category->id }}">Delete</a>
                                </td> --}}
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
                <div class="row">{{ $categories->links() }}</div>
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
                <form class="form-horizontal" id="form-2">
                    {{ csrf_field() }}
                    <div>
                        <label for="label">ID</label>
                        <input type="text" class="form-control" id="id" value="" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name" value="">
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
