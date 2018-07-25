<div class="ibox float-e-margins">
    <div class="ibox-content">
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr class="title-provinces">
                    <th>ID</th>
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
</div
