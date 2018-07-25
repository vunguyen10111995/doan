<h2>{{ trans('site.thank_service') }}</h2>
<p>{{ trans('site.plans') }} : <b>{{ $booking->plan->name }}</b></p>
<p>{{ trans('site.full_name') }} : <b>{{ $booking->full_name }}</b></p>
<p>{{ trans('site.email') }} : <b>{{ $booking->email }}</b></p>
<p>{{ trans('site.from') }} : <b>{{ $booking->start_at }}</b></p>
<p>{{ trans('site.to') }} : <b>{{ $booking->end_at }}</b></p>
<p>{{ trans('site.adults') }} : <b>{{ $booking->adult }}</b></p>
<p>{{ trans('site.child') }} : <b>{{ $booking->child }}</b></p>
<h3>{{ trans('total') }} : {{ $booking->total_amount }} $</h3>
