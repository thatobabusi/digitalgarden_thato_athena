@if (count($breadcrumbs))

    {{--@if($frontend)--}}
        {{--Frontend--}}
        <nav class="breadcrumb text-right">

            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <a class="breadcrumb-item" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                @else
                    <a class="breadcrumb-item active"> {{ $breadcrumb->title }}</a>
                @endif

            @endforeach
        </nav>
    {{--@else
        --}}{{--Backend--}}{{--
        <ol class="breadcrumb text-right">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    @endif--}}

@endif
