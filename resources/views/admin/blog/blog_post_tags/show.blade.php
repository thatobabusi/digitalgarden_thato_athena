@extends('layouts.backend.app_layout_backend_admin')

@section('content')

{{--<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPostTag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-tag.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-tag.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>--}}

@include('admin.blog.blog_post_tags._view_form')

@endsection
