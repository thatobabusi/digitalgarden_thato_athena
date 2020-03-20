@extends('layouts.backend.app_layout_backend_admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.blogPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.title_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.author') }}</label>
                <input class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" type="text" name="author" id="author" value="{{ old('author', '') }}" required>
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.author_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.summary') }}</label>
                <textarea class="form-control {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary" id="summary" required>{{ old('summary', '') }}</textarea>
                @if($errors->has('summary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('summary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.summary_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.body') }}</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" id="body" required>{{ old('body', '') }}</textarea>
                @if($errors->has('body'))
                    <div class="invalid-feedback">
                        {{ $errors->first('body') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.body_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', '') }}" required>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.category_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.blogPost.fields.tags') }}</label>
                <input class="form-control {{ $errors->has('tags') ? 'is-invalid' : '' }}" type="text" name="tags" id="tags" value="{{ old('tags', '') }}" required>
                @if($errors->has('tags'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.blogPost.fields.tags_helper') }}</span>
            </div>
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
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js'></script>
    <script>
        new FroalaEditor('textarea#summary');
        new FroalaEditor('textarea#body');
    </script>
@endsection
