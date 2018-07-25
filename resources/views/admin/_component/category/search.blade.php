@foreach($categories as $category)
    <tr class="value-categories {{$category->id}}" id="value-categories {{$category->id}}">
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
            <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $category->id }}>Update</a>
        </td>
    </tr>
@endforeach
