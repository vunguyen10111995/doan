@foreach($services as $service){
    <option value="{{ $service->id }}">{{ $service->name }}</option>
@endforeach
