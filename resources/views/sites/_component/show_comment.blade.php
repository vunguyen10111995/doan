<div class="comment-content">
    <div class="col-md-8">
        <header class="comment-header" style="border-bottom:1px solid">
            <p class="comment-author">
                <img src="{{ Auth::user()->avatar }}" class="img-circle img-comment">
            </p>
            <p>
                <a href="">{{ Auth::user()->full_name }}</a><span> {{ trans('site.say') }}:</span>
            </p>
            <p>
                {{ $time }}
            </p>
            <p class="framgia-content">{{ $content }}</p>
        </header>
    </div>
    <div class="col-md-4">
        @if(Auth::user()->id == $comment->user_id)
            <div class="dropdown manage-comment">
                <span class="dropdown-toggle manage-dropdown" data-toggle="dropdown">...</span>
                <ul class="dropdown-menu manage-menu">
                    <li class="edit">
                        <button type="submit" class="btn edit-comment btn-manage" plan-id="{{ $service_id }}" data="{{ $comment->id }}" value="{{ $comment->content }}">
                            <i class="fa fa-pencil"></i> 
                            {{ trans('site.edit') }}...
                            </button>
                    </li>
                    <li>
                        <form class="delete" action="" method="post" data-id="{{ $comment->id }}"> 
                            {{ csrf_field() }}
                            <button type="submit" class="btn delete btn-manage">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> 
                                {{ trans('site.delete') }}...
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endif
    </div> 
</div>
{{ Html::script('js/delete-comment.js') }}
