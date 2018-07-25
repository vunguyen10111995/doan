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
            <a class="fa fa-edit change_permission" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $request_service->status }}" data="{{ $request_service->id }}"></a> {{ ($request_service->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}
        </td>
        <td>
            <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $request_service->id }}>{{ trans('admin.view') }}</a>
        </td>
    </tr>
@endforeach
