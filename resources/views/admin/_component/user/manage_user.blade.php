@extends('admin.master')

@section('title')
    {{ trans('admin.manage_user') }}
@endsection

@section('script')
    {!! Html::script('js/manage_user.js') !!}
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ trans('admin.manage_user') }}</h2>
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
                    <form class="form-horizontal" method="POST" id="form-1" action="{{route('admin.user.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div>
                            <label for="label">{{ trans('admin.avatar') }}</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.fullname') }}</label>
                            <input type="text" name="full_name" class="form-control" id="full_name">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.email') }}</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.password') }}</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.repassword') }}</label>
                            <input type="password" name="repassword" class="form-control" id="repassword">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.address') }}</label>
                            <input type="text" name="address" class="form-control" id="address">
                        </div>
                        <div>
                            <label for="label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.gender') }}</label>
                            <select class="form-control" name="gender" selected id="gender">
                                @foreach (config('setting.gender') as $key => $gender)
                                <option value="{{ $gender }}" selected="" name="gender">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.level') }}</label>
                            <select class="form-control" name="level" selected id="level">
                                @foreach (config('setting.level') as $key => $level)
                                <option value="{{ $level }}" selected="" name="level">{{ $key }}</option>
                                @endforeach
                            </select>
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
    <div class="row" id="search_users">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <input type="text" name="search_user" id="search_user" class="form-control" placeholder="Search" value="">
        </div>
    </div>
    <div class="row filter_data">
        <div class="col-md-9">        
        </div>
        <div class="col-md-3">
            <select class="form-control" id="filter_data">
                @foreach (config('setting.level') as $key => $level)
                <option value="{{ $level }}" selected="" name="level">{{ $key }}
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
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">
                        <p id="edit_level">{{ trans('admin.edit_level') }}</p>
                    </h4>
                </div>
                <div class="modal-body row">
                    <div class="col-md-3">
                        <p class="select_level">{{ trans('admin.select_level') }}</p>
                    </div>
                    <div class="col-md-9">
                        <form method="PUT" class="form-horizontal" action="{{ route('admin.user.updateLevel', $user->id) }}" name="form1">
                            <select class="form-control select_level" id="select_level" name="level" selected data-id="">
                                @foreach (config('setting.level') as $key => $level)
                                <option value="{{ $level }}" selected="" name="level">{{ $key }}
                                </option>
                                @endforeach
                            </select>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                                <button type="button" class="btn btn-primary updateLevel">{{ trans('admin.save')}}</button>
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
                    <h4 class="modal-title" id="myModalLabel">{{ trans('admin.details')}}</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="form-2" enctype="multipart/form-data">
                        <div>
                            <img src="" id="images">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.fullname') }}</label>
                            <input type="text" class="form-control" id="full_names">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.email') }}</label>
                            <input type="email" class="form-control" id="emails">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.address') }}</label>
                            <input type="text" class="form-control" id="addresss">
                        </div>
                        <div>
                            <label for="label">Phone</label>
                            <input type="text" class="form-control" id="phones">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.gender') }}</label>
                            <input type="text" class="form-control" id="genders" selected value="">
                        </div>
                        <div>
                            <label for="label">{{ trans('admin.level') }}</label>
                            <input type="text" class="form-control" id="levels" selected value="">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
