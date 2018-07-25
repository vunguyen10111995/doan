<div class="ibox float-e-margins">
    <div class="ibox-content">
        <table class="footable table table-stripped toggle-arrow-tiny">
            <thead>
                <tr class="title-users">
                    <th>ID</th>
                    <th>{{ trans('admin.fullname') }}</th>
                    <th>{{ trans('admin.email') }}</th>
                    <th id="avatar">{{ trans('admin.avatar') }}</th>
                    <th>{{ trans('admin.address') }}</th>
                    <th id="gender">{{ trans('admin.gender') }}</th>
                    <th id="phone">Phone</th>
                    <th id="level">{{ trans('admin.level') }}</th>
                    <th id="status">{{ trans('admin.detail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="value-users {{$user->id}}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ $user->avatar }}" id="avatar"></td>
                    <td>{{ $user->address }}</td>
                    <td>{{ ($user->gender == 'male') ? 'Male' 
                        : 'Female' }}
                    </td>
                    <td>{{ $user->phone }}</td>
                    @if(Auth::user()->id == $user->id)
                        <td>
                            <a class="change_level" value="{{ $user->admin_access }}" data="{{ $user->id }}"></a>{{ ($user->admin_access == 0) ? 'Guest' : trans('admin.admin') }}
                        </td>
                    @else
                        <td>
                            <a class="fa fa-edit change_level" aria-hidden="true" data-toggle="modal" data-target="#myModal" value="{{ $user->admin_access }}" data="{{ $user->id }}"></a>{{ $user->admin_access == 0 ? 'Guest' : 'Admin' }}
                        </td>
                    @endif
                    <td>
                        <a type="button" class="btn btn-primary btn-sm view_detail" data-toggle="modal" data-target="#viewModal" data-id={{ $user->id }}>{{ trans('admin.view') }}</a>
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
    <div class="row">{{ $users->links() }}</div>
</div>