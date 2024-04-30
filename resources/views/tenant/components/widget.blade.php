<div class="card {{$class ?? 'border-primary'}}" @if(!empty($id)) id="{{$id}}" @endif>
    @if(empty($header))
        @if(!empty($title) || !empty($tool))
        <div class="=card-title d-flex align-items-center">
            {!!$icon ?? '' !!}
            <h3 class="mb-0 text-primary">{{ $title ?? '' }}</h3>
            {!!$tool ?? ''!!}
        </div>
        @endif
    @else
        <div class="card-title">
            {!! $header !!}
        </div>
    @endif

    <div class="card-body">
        {{$slot}}
    </div>
    <!-- /.box-body -->
</div>





