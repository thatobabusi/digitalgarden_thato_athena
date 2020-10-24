@foreach($resume->resumeDevStack as $stack)
<div class="item col-6 col-lg-3">
    <div class="item-inner">
        <div class="item-icon">
            {!! $stack->icons !!}
        </div>
        <h3 class="item-title">
            {{$stack->title}}
        </h3>
        <div class="item-desc">
            <ul>
                @foreach($stack->resumeDevStackItems as $stack_item)
                <li>• {{$stack_item->title}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endforeach
