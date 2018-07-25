@extends('admin.master')

@section('title')
    {{ trans('admin.manage_request_service') }}
@endsection

@section('script')
    {!! Html::script('js/manage_request_service.js') !!}
@endsection

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>{{ trans('admin.manage_request_service') }}</h2>
    </div>
</div>
<div class="panel-body">
<div class="row" id="search_request_services">
    <div class="col-md-6"></div>
    <div class="col-md-3">
        <input type="text" id="search_request_service" class="form-control" placeholder="{{ trans('admin.search') }}" value="">
    </div>
    <div class="col-md-3">
        <select class="form-control" id="filter_data">
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>
</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr class="title-request_services">
                                <th>{{ trans('admin.id') }}</th>
                                <th>{{ trans('admin.categories') }}</th>
                                <th>{{ trans('admin.provinces') }}</th>
                                <th>{{ trans('admin.user') }}</th>
                                <th>{{ trans('admin.name') }}</th>
                                <th>{{ trans('admin.address') }}</th>
                                <th>{{ trans('admin.open_time') }}</th>
                                <th>{{ trans('admin.price') }}</th>
                                <th>{{ trans('admin.status') }}</th>
                                <th>{{ trans('admin.detail') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($request_services as $request_service)
                                <tr class="value-request_services {{ $request_service->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $request_service->category->name }}</td>
                                    <td>{{ $request_service->province->name }}</td>
                                    <td>{{ $request_service->user->full_name }}</td>
                                    <td>{{ $request_service->name }}</td>
                                    <td>{{ substr($request_service->address, 0, 20) }}...</td>
                                    <td>{{ $request_service->open_time }}</td>
                                    <td>{{ $request_service->price }}</td>
                                    <td>
                                        <a @if($request_service->status == config('setting.status.inprogress')) class="fa fa-edit change_permission" 
                                        @else
                                        @endif aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $request_service->status }}" data="{{ $request_service->id }}"></a> {{ ($request_service->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $request_service->id }}>{{ trans('admin.view') }}</a>
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
                <div class="row">{{ $request_services->links() }}</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <p id="edit_permission">{{ trans('admin.edit_permission') }}</p>
                </h4>
            </div>
            <div class="modal-body row">
                <div class="col-md-3">
                    <p class="select_permission">{{ trans('admin.select_permission') }}</p>
                </div>
                <div class="col-md-9">
                    <form method="PUT" class="form-horizontal" name="form2" action="">
                        <select class="form-control select_permission" id="select_permission" selected data-id="" name="permission">
                            @foreach (config('setting.status') as $key => $status)
                                <option value="{{ $status }}" selected="" name="status">{{ $key }}
                                </option>
                            @endforeach
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                            <button type="button" class="btn btn-primary updateStatus">{{ trans('admin.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans('admin.details') }}</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-2" enctype="multipart/form-data" action="">
                    {{ csrf_field() }}
                    <div>
                        <div id="image_display">
                            <img src="" id="image" alt="">
                        </div>
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.id') }}</label>
                        <input type="text" class="form-control" id="id" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.name') }}</label>
                        <input type="text" class="form-control" id="name" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.categories') }}</label>
                        <input type="text" class="form-control" id="category" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.provinces') }}</label>
                        <input type="text" class="form-control" id="province" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.user') }}</label>
                        <input type="text" class="form-control" id="user" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.address') }}</label>
                        <input type="text" class="form-control" id="address" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.open_time') }}</label>
                        <input type="text" class="form-control" id="open_time" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.price') }}</label>
                        <input type="text" class="form-control" id="price" disabled="">
                    </div>
                    <div>
                        <label for="label">{{ trans('admin.status') }}</label>
                        <input type="text" class="form-control" id="status" disabled="">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
