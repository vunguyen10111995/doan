@extends('admin.master')

@section('title')
    Manage Service
@endsection

@section('script')
    {!! Html::script('js/manage_plan.js') !!}
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Manage Service</h2>
        </div>
    </div>
<div class="panel-body" id="manage_plan">
    <button class="fa fa-plus btn btn-primary addValue" aria-hidden="true" data-toggle="modal" data-target="#addValue">{{ trans('admin.add') }}</button>
    <div class="modal fade" id="addValue" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ trans('admin.add') }}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" id="multiple_select_form" action="{{ route('admin.service.store') }}">
                        {{ csrf_field() }} 
                        <div>
                            <label for="label">{{ trans('admin.title') }}</label>
                            <input class="form-control" name="title" id="title">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.description') }}</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.start_at') }}</label>
                            <input type="date" name="start_at" class="form-control" id="start_at">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.end_at') }}</label>
                            <input type="date" name="end_at" class="form-control" id="end_at">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                            <input type="submit" class="btn btn-primary createValue" name="submit" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="search_plans">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <input type="text" name="search_plan" id="search_plan" class="form-control" placeholder="Search" value="">
        </div>
    </div>
    <div class="row filter_data">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <select class="form-control" id="filter_data">
                @foreach (config('setting.status') as $key => $status)
                    <option value="{{ $status }}" selected="" name="status">{{ $key }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <table class="footable table table-stripped toggle-arrow-tiny">
                            <thead>
                                <tr class="title-plans">
                                    <th>{{ trans('admin.id') }}</th>
                                    <th>{{ trans('admin.user') }}</th>
                                    <th>Category</th>
                                    <th>{{ trans('admin.title') }}</th>
                                    <th>{{ trans('admin.description') }}</th>
                                    <th>Sale From</th>
                                    <th>Sale End</th>
                                    <th>Sale Percent</th>
                                    <th>Note</th>
                                    <th id="status">{{ trans('admin.status') }}</th>
                                    <th>{{ trans('admin.view') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr class="value-plans {{ $service->id }}" id="value-plans {{ $service->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td id="full_name">{{ $service->user->full_name }} </td>
                                        <td>{{ $service->category->name }} </td>
                                        <td>{{ $service->title }}</td>
                                         <td>{{ substr($service->description, 0, 20) }}...</td>
                                        <td>{{ $service->sale_from }}</td>
                                        <td>{{ $service->sale_end }}</td>
                                        <td>{{ $service->sale_percent}}</td>
                                        <td>{{ $service->note}}</td>
                                        <td>
                                            <a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $service->status }}" data="{{ $service->id }}"></a> {{ ($service->status == 'pending') ? 'Pending' : 'Approved' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.service.show', $service->id) }}" type="button" class="btn btn-primary btn-sm view_detail" data-id={{ $service->id }}>{{ trans('admin.view') }}</a>
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
                    <div class="row">{{ $services->links() }}</div>
                </div>
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
@endsection
