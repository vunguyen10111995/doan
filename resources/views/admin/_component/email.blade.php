Hello <i>{{ $user->full_name }}</i>, 
Chương trình {{ $service->title }} giảm giá {{ $service->sale_percent }} % từ ngày
{{ $service->sale_from }} đến ngày {{ $service->sale_end }} của bạn đã được admin chúng tôi {{ ($service->status == 'approved') ? 'phê duyệt' : 'gỡ xuống' }}, Hãy đến ngay với Utt-sale để xem chi tiết sản phẩm của mình nhé.
Link: <a href={{ url('/') }}>Go to now</a>
