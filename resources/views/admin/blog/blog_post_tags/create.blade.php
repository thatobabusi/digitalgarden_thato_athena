@extends('layouts.backend.app_layout_backend_admin')

@section('content')

    <div class="card">

        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.blogPostTag.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog-tag.store") }}" enctype="multipart/form-data">
                @method('post')
                @csrf

               @include('admin.blog.blog_post_tags._create_form')

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
