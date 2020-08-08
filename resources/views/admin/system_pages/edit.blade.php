@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.system-pages.index', \Str::title('Pages Manager')) }}
@endsection

@section('content')

    {{--@yield('breadcrumbs')

    @can('user_create')
        @include('partials.backend.buttons.blog_management_top_buttons')
    @endcan--}}

    {{--Create Page--}}
    <div class="card">
        <form method="POST" action="{{ route("admin.system-pages.update", [$system_page->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="card-header">
                Create Page
            </div>
            <div class="card-body">

                @include('admin.system_pages._form_page')
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
            <li class="nav-item">
                <a class="nav-link" href="#page_fields" role="tab" data-toggle="tab">
                    Page Fields
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="page_meta_data">
                @includeIf('admin.system_pages._form_page_metadata', ['system_page_metadata' => $system_page->systemPageMetadata])
            </div>
            <div class="tab-pane" role="tabpanel" id="page_sections">
                @include('admin.system_pages._table_page_sections')
            </div>
            <div class="tab-pane" role="tabpanel" id="page_fields">
                {{--@includeIf('admin.image._view_form', ['image' => $blogPost->blogPostImage()])--}}
                @include('admin.system_pages._form_page_fields')
            </div>
        </div>
    </div>

    <div class="modal fade" id="page-section-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="page-section-modal-title" name="page-section-modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    @include('admin.system_pages._form_page_sections')
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{ Form::button('Store',['class' => 'btn btn-success', 'id' => 'store-page-sections']) }}
                    {{ Form::button('Update',['class' => 'btn btn-success', 'id' => 'update-page-sections']) }}
                    <button type="button" class="btn btn-secondary" id="dismiss-page-sections" name="dismiss-page-sections" data-dismiss="modal">
                        Close
                    </button>
                </div>

            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/tinymce.js') }}"></script>

    <script>
        var new_comment = '';
        var formgroup_comment = 1;

        var addCommentGroup = function (event) {

            event.preventDefault();
            var $formGroup = $(this).closest('.next_input_group_to_duplicate');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                return;
            }

            $(this).toggleClass('btn-addComment btn-danger btn-removeComment').html('–');
            /*$(this).toggleClass('btn-default btn-addComment btn-danger btn-removeComment').html('–');*/

            var input = $formGroupClone.find('#new_comment');

            var name = input.attr('name').substr(0, input.attr('name').lastIndexOf('['));

            input.val(new_comment).attr('name', name + '[' + countFormGroup($multipleFormGroup) + ']');

            $formGroupClone.insertAfter($formGroup);
            $formGroupClone.find('.flag-container:first').remove();

            var $lastFormGroupLast = $multipleFormGroup.find('.next_input_group_to_duplicate:last');

            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-addComment').attr('disabled', true);
            }

            formgroup_comment++;
        };

        var removeCommentGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.next_input_group_to_duplicate:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-addComment').attr('disabled', false);
            }

            $formGroup.remove();

            var allFormGroups = $multipleFormGroup.find('.next_input_group_to_duplicate');

            var i = 0;
            $.each(allFormGroups, function (index, value) {

                var input = $(value).find('#new_comment');

                var name = input.attr('name').substr(0, input.attr('name').lastIndexOf('['));

                input.attr('name', name + '[' + i + ']');
                i++;
            });
        };

        var countFormGroup = function ($form) {
            return $form.find('.next_input_group_to_duplicate').length;
        };

        $(document).on('click', '.btn-addComment', addCommentGroup);
        $(document).on('click', '.btn-removeComment', removeCommentGroup);

        /*
         ***************************************************************************************************************
         */

        var page_sections_table = $('.page-sections').DataTable({

            ajax: {
                'processing': true,
                url: '{{ route("admin.system-page-sections.index", [$system_page->id]) }}',
                data: {
                    'system_page_id': "{{$system_page->id}}"
                },
                complete: function (data) { },
            },
            columns: [
                {data: "title"},
                {data: "header"},
                {data: "subheader"},
                {data: "order"},
                {
                    data: function (data) {
                        return '' +
                            '<div class="btn-group">' +
                            '   <div class="text-center">' +
                            '       <a href="#page-section-modal" class="btn btn-xs btn-primary" type="button" data-toggle="modal" ' +
                            '           onclick="updatePageSectionModalFields(' + data.id + ')">Edit</a>' +
                            '   </div>' +
                            '   <div class="text-center">' +
                            '       <a href="#" class="btn btn-xs btn-danger" type="button">' +
                            '           <i class="fa fa-trash"></i> Delete' +
                            '       </a>' +
                            '   </div>' +
                            '</div>';
                    }
                }
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

        function updatePageSectionModalFields(id)
        {
            //Clear the form
            $('#page_section_title').val();
            $('#page_section_header').val();
            $('#page_section_subheader').val();
            $('#page_section_order').val();
            $('#page_section_body').val();

            //Overlay to compensate for the short delay in populating the form
            displayOverlay("Fetching Section Details");

            $.ajax({
                type: 'GET',
                url: '{{ route("admin.pages.ajaxGetById", [$system_page->id]) }}',
                data: {
                    id: id,
                },
                success: function (data, response) {
                    //Update the form
                    if(response === "success") {
                        $('#section_id').val(data.data.id);
                        $('#page_section_title').val(data.data.title);
                        $('#page_section_header').val(data.data.header);
                        $('#page_section_subheader').val(data.data.subheader);
                        $('#page_section_order').val(data.data.order);
                        $('#page_section_body').val(data.data.body);

                        $('#store-page-sections').hide();
                        $('#update-page-sections').show();
                        $('#page-section-modal-title').html("Update Page Section");

                        removeOverlay();
                    }
                    else {
                        alert("error");
                        removeOverlay();
                    }
                },
                error: function () {
                    alert('Error occured');
                }
            });
            $('#section_id').val(id);
        }

        $('#add-new-page-section').click(function () {
            //Clear the form
            $('#page_section_title').val();
            $('#page_section_header').val();
            $('#page_section_subheader').val();
            $('#page_section_order').val();
            $('#page_section_body').val();

            $('#store-page-sections').show();
            $('#update-page-sections').hide();

            $('#page-section-modal-title').html("Add Page Section");
        });

        $('#store-page-sections').click(function () {
            var button = $(this);
            button.prop('disabled', true);

            $.ajax({
                type: 'GET',
                url: '{{ route("admin.pages.ajaxStore", [$system_page->id]) }}',
                data: {
                    page_id: "{{$system_page->id}}",
                    title: $('#page_section_title').val(),
                    header: $('#page_section_header').val(),
                    subheader: $('#page_section_subheader').val(),
                    order: $('#page_section_order').val(),
                    body:  $('#page_section_body').val(),
                },
                success: function (data, response) {

                    if (response === "success") {
                        button.prop('disabled', false);

                        $('#page-section-modal').modal('toggle');

                        page_sections_table.ajax.reload();
                    }

                    else {
                        alert(response.message);
                        button.prop('disabled', false);
                    }
                },
                error: function () {
                    button.prop('disabled', false);
                }
            });
        });

        $('#update-page-sections').click(function () {
            var button = $(this);
            button.prop('disabled', true);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                url: '{{ route("admin.pages.ajaxUpdate", [$system_page->id]) }}',
                data: {
                    section_id: $('#section_id').val(),
                    title: $('#page_section_title').val(),
                    header: $('#page_section_header').val(),
                    subheader: $('#page_section_subheader').val(),
                    order: $('#page_section_order').val(),
                    body:  $('#page_section_body').val()
                    //body:  document.getElementById('page_section_body').value, //$('#page_section_body').val(),
                },
                success: function (data, response) {

                    if (response === "success") {
                        button.prop('disabled', false);

                        $('#page-section-modal').modal('toggle');

                        page_sections_table.ajax.reload();
                    }

                    else {
                        alert(response.message);
                        button.prop('disabled', false);
                    }
                },
                error: function () {
                    button.prop('disabled', false);
                }
            });

        });

        function deleteAdditionalCost(cost_id) {
            $.ajax({
                type: 'DELETE',
                url: '{{ route("admin.system-page-sections.destroy", [$system_page->id]) }}',
                data: {'cost_id': cost_id},
                success: function (response) {

                    if (response.success) {
                        additional_costs_table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                            var data = this.data();

                            if (typeof data !== 'undefined') {
                                if (data.id === cost_id) {
                                    this.remove(false);
                                }
                            }
                        }).draw();

                        toastr.success('Additional Cost Deleted Successfully.');
                    }

                    else {
                        alert(response.message);
                    }

                },
                error: function () {

                }
            });
        }
    </script>
@endsection
