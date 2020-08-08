@extends('layouts.backend.app_layout_backend_admin')

@section('styles')
    <link href="{{ asset('css/stylesbytype/uploadstyles.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog.create', \Str::title('Create')) }}
@endsection

@section('content')

    {{--@yield('breadcrumbs')

    @can('user_create')
        @include('partials.backend.buttons.blog_management_top_buttons')
    @endcan--}}

    {{--Create Page--}}
    <div class="card">
        <form method="POST" action="{{ route("admin.system-pages.store") }}" enctype="multipart/form-data">
            <div class="card-header">
                Create Page
            </div>
            <div class="card-body">
                @method('post')
                @csrf

                @include('admin.system_pages._form_page')


                @include('admin.system_pages._form_page_metadata')
            </div>
            <div class="card-footer">
                <div class="form-group dont-pad button-group">
                    <button class="btn btn-success" type="submit">
                        {{ trans('global.save') }}
                    </button>
                    <button class="btn btn-danger" type="submit">
                        Clear
                    </button>
                    <button class="btn btn-info" type="submit">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')

    {{--<script type="text/javascript" src="{{ URL::asset('vendor/tinymce/tinymce.min.js') }}"></script>--}}
    {{--<script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/tinymce.js') }}"></script>--}}

    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/imageupload.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/scriptsbytype/ckeditor.js') }}"></script>

    <script>
        CKEDITOR.replace('summary');
        CKEDITOR.replace('body');

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
    </script>

@endsection
