<div class="form-group">
    @isset($label)
        <label>@lang($label)</label>
    @endisset
    <div class="input-group">
        @isset($prepend)
            <div class="input-group-prepend">
                <span class="input-group-text" style="border-top-right-radius: 0px;border-bottom-right-radius:0px!important;">@lang($prepend)</span>
            </div>
            <span class="text-danger">{{ $errors->first($attributes['name']) }}</span>
        @endisset
        <input
            @foreach ($attributes as $key => $attr)
                {{$key}}="{{$attr}}"
            @endforeach
        >
        @isset($append)
            <div class="input-group-append">
                <span class="input-group-text" style="border-top-left-radius: 0px;border-bottom-left-radius:0px!important;">@lang($append)</span>
            </div>
            <span class="text-danger">{{ $errors->first($attributes['name']) }}</span>
        @endisset
    </div>
</div>

<!-- <div class="input-group">
    <div class="input-group-prepend">
    <span class="input-group-text">$</span>
    </div>
    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
    <div class="input-group-append">
    <span class="input-group-text">.00</span>
    </div>
</div> -->