<div class="form-group">
    @isset($label)
        <label>@lang($label) <span class="text-danger">{{ isset($attributes['required'])?'*':''}}</span></label>
    @endisset
    <input 
        @foreach ($attributes as $key => $attr)
            {{$key}}="{{$attr}}"
        @endforeach
    >
    <span class="text-danger">{{ $errors->first($attributes['name']) }}</span>
</div>