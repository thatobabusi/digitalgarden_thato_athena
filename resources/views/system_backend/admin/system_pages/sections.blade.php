@extends('system_layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    @if(isset($systemPageSection->id))
    {{ Breadcrumbs::render('admin.system-pages.section-edit', Str::title($systemPage->title), Str::title($systemPageSection->title)) }}
    @else
    {{ Breadcrumbs::render('admin.system-pages.section-create', Str::title($systemPage->title)) }}
    @endif
@endsection

@section('content')

    @yield('breadcrumbs')

    {{--Create Page--}}
    <div class="card">
        <form method="POST"
              @if(isset($systemPageSection->id))
                action="{{ route("admin.system-page-sections.update", [$systemPageSection->id]) }}"
              @else
                action="{{ route("admin.system-page-sections.store") }}"
              @endif
              enctype="multipart/form-data">
            <div class="card-header">
                Create Page
            </div>
            <div class="card-body">
                @if(isset($systemPageSection->id))
                    @method('PUT')
                @else
                    @method('post')
                @endif

                @csrf

                @include('system_backend.admin.system_pages._form_page_sections')

            </div>
            <div class="card-footer">
                <div class="form-group dont-pad button-group">
                    <button class="btn btn-success" type="submit">
                        @if(isset($systemPageSection->id)) Update @else {{ trans('global.save') }} @endif
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/tinymce.js') }}"></script>
@endsection
