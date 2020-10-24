@extends('system_layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.system-pages.edit', Str::title($system_page->title)) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    {{--Create Page--}}
    <div class="card">
        <form method="POST" action="{{ route("admin.system-pages.update", [$system_page->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="card-header">
                Create Page
            </div>
            <div class="card-body">

                @include('system_backend.admin.system_pages._form_page')
            </div>

            <div class="card-footer">
                <div class="form-group dont-pad button-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>

        </form>
    </div>

    <div class="card">

        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>

        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item active">
                <a class="nav-link" href="#page_meta_data" role="tab" data-toggle="tab">
                    Page Meta Data
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#page_sections" role="tab" data-toggle="tab">
                    Page Sections
                </a>
            </li>
            {{--<li class="nav-item">
                <a class="nav-link" href="#page_fields" role="tab" data-toggle="tab">
                    Page Fields
                </a>
            </li>--}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="page_meta_data">
                @includeIf('system_backend.admin.system_pages._form_page_metadata', ['system_page_metadata' => $system_page_metadata])
            </div>
            <div class="tab-pane" role="tabpanel" id="page_sections">
                @include('system_backend.admin.system_pages._table_page_sections')
            </div>
            {{--<div class="tab-pane" role="tabpanel" id="page_fields">
                @include('system_backend.admin.system_pages._form_page_fields')
            </div>--}}
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/tinymce.js') }}"></script>

    <script>
        let page_sections_table = $('.page-sections').DataTable({
            //processing: true,
            serverSide: true,
            pageLength: 10,
            ajax: {
                'processing': true,
                url: '{{ route("admin.system-page-sections.index", [$system_page->id]) }}',
                data: {
                    'system_page_id': "{{$system_page->id}}"
                },
                complete: function (data) { },
            },
            columns: [
                {data: 'id', name: 'DT_RowIndex',  visible: false, searchable: false},
                {data: "title"},
                {data: "header"},
                {data: "subheader"},
                {data: "order"},
                {data: 'actions', name: 'actions', orderable: false, searchable: false},
            ],
            order: [[3, "asc"]],
            stateSave: true,
            responsive: true,
            dom: 'Bfrtip',
            paging: false,
            buttons: {
            }
        });
        page_sections_table.buttons().remove();

    </script>
@endsection
