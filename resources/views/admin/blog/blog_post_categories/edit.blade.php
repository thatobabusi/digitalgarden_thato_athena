@extends('layouts.backend.app_layout_backend_admin')

@section('content')

    <div class="card">

        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.blogPostCategory.title_singular') }} : {{$blogPostCategory->title}}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog-category.update", [$blogPostCategory->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

               @include('admin.blog.blog_post_categories._edit_form')

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        //
    </script>
@endsection