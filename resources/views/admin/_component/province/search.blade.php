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
