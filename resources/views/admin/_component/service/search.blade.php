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
