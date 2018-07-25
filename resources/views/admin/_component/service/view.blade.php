@extends('admin.master')

@section('style')
    {{ Html::style('css/admin_plan.css') }}
    {{ Html::style('bowers/select2/dist/css/select2.min.css') }}
    {{ Html::style('/bowers/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
   
@endsection

@section('content')
<div class="page-wrap">
    <div class="container content-request">
        <div class="w3agile-about-section-head text-center">
            <h2>Detail</h2>
            <span></span>
            <hr>
        </div>
        <div class="centeredDiv">
            <div>
                <h5><b>Title</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="title" disabled="">{{ $service->title }}</textarea>
            </div>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label>{{ trans('site.from') }}</label>
                    <i class="fa fa-calendar"></i>
                    <input type='text' name="start_at" class="form-control datepicker"  value="{{ $service->sale_from }}"/ disabled="">
                </div>
                <div class="form-group col-md-6">
                    <label>{{ trans('site.to') }}</label>
                            <i class="fa fa-calendar"></i>
                    <input type="text" name="end_at" class="form-control datepicker" value="{{ $service->sale_end }}" disabled="">
                </div>
            </div>
            <div>
                <h5><b>{{ trans('site.description') }}</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="description" disabled="">{{ $service->description }}</textarea>
            </div>
            <br>
            <div>
                <h5><b>Sale Percent</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="description" disabled="">{{ $service->sale_percent }}</textarea>
            </div>
            <div>
                <h5><b>Note</b> <i class="fa fa-pencil" aria-hidden="true"></i>
                </h5>
                <textarea class="form-control" name="price" disabled="">{{ $service->note }}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-12 service">
                    <label>Number Of Address</label>
                    <i class="fa fa-calendar"></i>
                    <input name="number_services" type="text" id="number-services" class="form-control" min="0" value="{{ count($service->address) }}" disabled="">
                </div>
            </div>
            <div class="form-group">
                <span>
                    <b>Address</b>
                </span>
                <div class="schedules">
                    <div id="expand">
                        @foreach($service->address as $addr)
                        	<p class="number-services">{{ $loop->iteration }}</p>
                        	<div class="row">
                            	<div class="col-md-12">
                                    <h5>
                                        <b>Address Detail</b> 
                                        <i class="fa fa-commenting-o"></i>
                                    </h5>
                                    <textarea class="form-control" name="title_schedule[]" required="" disabled="">{{ $addr->name_address }}</textarea>
                                </div>
                        	</div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>
                                        <b>Telephone</b> 
                                        <i class="fa fa-commenting-o"></i>
                                    </h5>
                                    <textarea class="form-control" name="title_schedule[]" required="" disabled="">{{ $addr->telephone }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>
                                        <b>{{ trans('admin.description') }}</b> 
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </h5>
                                    <textarea class="form-control" name="des[]" required="" disabled="">{{ $addr->description }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" style="margin-bottom: 25px">
                        <div class="col-md-6">
                            <h5>
                                <b>{{ trans('site.status') }}</b>
                            </h5>
                            <input type="text" name="status" disabled value="{{ ($service->status == 'pending') ? 'pending' 
                                : trans('admin.approved')  }}" class="form-control">
                        </div>
                    </div>
            	</div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{ Html::script('bowers/select2/dist/js/select2.full.min.js') }}
    {{ Html::script('/bowers/moment/min/moment.min.js') }}
    {{ Html::script('/bowers/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('js/list_fork.js') }}  
@endsection
