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