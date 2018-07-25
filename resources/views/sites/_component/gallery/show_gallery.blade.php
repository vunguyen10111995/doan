<i class="fa fa-picture-o" aria-hidden="true"></i> <span class="gallery-header">Gallery</span>
<div class="filter">
    <select class="select-plan" class="form-control">
        <option>{{ trans('site.select') }}</option>
        @foreach($plans as $plan)
            <option value="{{ $plan->id }}"><a href="">{{ $plan->title }}</a></option>
        @endforeach
    </select>
</div>
<div class="img-detail"></div>
