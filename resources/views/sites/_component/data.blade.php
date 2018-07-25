<div class="row">
    <div class="col-md-12">
        <h5>
            <b>Address</b> 
            <i class="fa fa-commenting-o"></i>
        </h5>
        <input class="form-control" name="title_address[]" required></input>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>
            <b>Telephone</b> 
            <i class="fa fa-commenting-o"></i>
        </h5>
        <input class="form-control" name="telephone[]" required></input>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h5>
            <b>{{ trans('site.description') }}</b> 
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </h5>
        <input class="form-control" name="des[]" required></input>
    </div>
</div>
<hr>
{{ Html::script('js/dashboard.js') }} 
