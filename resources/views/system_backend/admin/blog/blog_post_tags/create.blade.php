@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.blog-tag.create', \Str::title('Create')) }}
@endsection

@section('content')

    @yield('breadcrumbs')

    <div class="card">

        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.blogPostTag.title_singular') }}
        </div>

        <div class="card-body">

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-tag.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <form method="POST" action="{{ route("admin.blog-tag.store") }}" enctype="multipart/form-data">
                @method('post')
                @csrf

               @include('system_backend.admin.blog.blog_post_tags._create_form')

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-tag.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        //
    </script>
@endsection
