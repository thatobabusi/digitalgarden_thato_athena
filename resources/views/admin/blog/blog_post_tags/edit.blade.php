@extends('layouts.backend.app_layout_backend_admin')

@section('content')

    <div class="card">

        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.blogPostTag.title_singular') }} : {{$blogPostTag->title}}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.blog-tag.update", [$blogPostTag->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

               @include('admin.blog.blog_post_tags._edit_form')

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
