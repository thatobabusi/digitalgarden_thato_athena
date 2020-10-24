<div class="row col-md-12">

    <div class="form-group col-md-6">

        <label class="required" for="title">{{ trans('cruds.blogPostCategory.fields.title') }}</label>

        <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
               type="text" name="title" id="title" value="{{ old('title',$blogPostCategory->title) }}" required>

        @if($errors->has('title'))
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif

        <span class="help-block">{{ trans('cruds.blogPostCategory.fields.title_helper') }}</span>
    </div>

    <div class="form-group col-md-6">

        <label class="required" for="slug">{{ trans('cruds.blogPostCategory.fields.slug') }}</label>
        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
               type="text" name="slug" id="slug" value="{{ old('slug', $blogPostCategory->slug) }}" required>

        @if($errors->has('slug'))
            <div class="invalid-feedback">
                {{ $errors->first('slug') }}
            </div>
        @endif

        <span class="help-block">{{ trans('cruds.blogPostCategory.fields.slug_helper') }}</span>
    </div>

    <div class="form-group col-md-6">

        <label class="required" for="created_at">{{ trans('cruds.blogPostCategory.fields.created_at') }}</label>
        <input class="form-control {{ $errors->has('created_at') ? 'is-invalid' : '' }}"
               type="text" name="created_at" id="created_at" value="{{ old('created_at', $blogPostCategory->created_at) }}" readonly>

        @if($errors->has('created_at'))
            <div class="invalid-feedback">
                {{ $errors->first('created_at') }}
            </div>
        @endif

        <span class="help-block">{{ trans('cruds.blogPostCategory.fields.created_at_helper') }}</span>
    </div>

    <div class="form-group col-md-6">

        <label class="required" for="updated_at">{{ trans('cruds.blogPostCategory.fields.updated_at') }}</label>
        <input class="form-control {{ $errors->has('updated_at') ? 'is-invalid' : '' }}"
               type="text" name="updated_at" id="updated_at" value="{{ old('updated_at', $blogPostCategory->updated_at) }}" readonly>

        @if($errors->has('updated_at'))
            <div class="invalid-feedback">
                {{ $errors->first('updated_at') }}
            </div>
        @endif

        <span class="help-block">{{ trans('cruds.blogPostCategory.fields.updated_at_helper') }}</span>
    </div>

</div>
