<div class="upload-img">
    <form action="{{ route('plan.gallery.upload', $plan->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label>{{ trans('site.plan_name') }}</label>
        <p>{{ $plan->title }}</p>
        <label>{{ trans('site.title') }}</label>
        <input type="text" name="image_name" class="form-control">
        <input type="file" name="image" id="file">
        <div id="image_display">
            <img src="" id="image_gallery" alt="">
        </div>
        <button type="submit" id="upload-gallery" class="btn buttonTransparent">{{ trans('site.submit') }}</button>
    </form>
</div>
