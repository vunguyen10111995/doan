@if (!$services->isEmpty())
    <div class="header_search">
         <h4><span><i class="fa fa-calendar" aria-hidden="true"></i></span> Service </h4>
    </div>
    <ul class="content">
        @foreach($services as $service)
            <li>
            <a href="{{ route('service.detail', $service->id) }}">
                <p style="float: left;">{{ $service->title }}</p>
                </a>
                
            </li>
        @endforeach
    </ul>
@else
    <h4>{{ trans('site.not_found') }}</h4> 
@endif
