<div class="col-md-12" {{--style="border: 1px solid #f0f3f5 !important;"--}}>
    <div class="row">

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.blogPost.fields.title') }}</label>

            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('title',$blogPost->title) }}" required>

            @if($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.title_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="slug">{{ trans('cruds.blogPost.fields.slug') }}</label>
            <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                   type="text" name="slug" id="slug" value="{{ old('slug', $blogPost->slug) }}" required>

            @if($errors->has('slug'))
                <div class="invalid-feedback">
                    {{ $errors->first('slug') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="user_id">{{ trans('cruds.blogPost.fields.author') }}</label>
            @if(isset($blogPost->id))
                <select class="form-control select2 {{ $errors->has('user_id') ? 'is-invalid' : '' }}"
                        name="user_id" id="user_id" required>

                        @foreach($users as $id => $author)
                            <option value="{{ $id }}"
                                {{ $blogPost->user_id == $id ? 'selected' : '' }}
                            >
                                {{ $author }}
                            </option>
                        @endforeach
                </select>
            @endif

            @if($errors->has('user_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('user_id') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.author_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="blog_post_status_id">{{ trans('cruds.blogPost.fields.blog_post_status_id') }}</label>

            <select class="form-control select2 {{ $errors->has('blog_post_status_id') ? 'is-invalid' : '' }}"
                    name="blog_post_status_id" id="blog_post_status_id" required>

                @foreach($statusses as $id => $status)
                    <option value="{{ $id }}"
                        {{ isset($blogPost->blog_post_status_id) && $blogPost->blog_post_status_id == $id ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('blog_post_status_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('blog_post_status_id') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.blog_post_status_id_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="blog_post_category_id">{{ trans('cruds.blogPost.fields.category') }}</label>

            <select class="form-control select2 {{ $errors->has('blog_post_category_id') ? 'is-invalid' : '' }}"
                    {{--name="blog_post_category_id[]"--}} name="blog_post_category_id" id="blog_post_category_id" required>

                @foreach($categories as $id => $category)
                    <option value="{{ $id }}"
                        {{ $blogPost->blogPostCategory->id == $id ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('blog_post_category_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('blog_post_category_id') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.blogPost.fields.category_helper') }}</span>
        </div>

        <div class="form-group col-md-3">

            <label class="required" for="created_at">{{ trans('cruds.blogPost.fields.created_at') }}</label>
            <input class="form-control {{ $errors->has('created_at') ? 'is-invalid' : '' }}"
                   type="text" name="created_at" id="created_at" value="{{ old('created_at', $blogPost->created_at) }}" readonly>

            @if($errors->has('created_at'))
                <div class="invalid-feedback">
                    {{ $errors->first('created_at') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.created_at_helper') }}</span>
        </div>

        <div class="form-group col-md-3">

            <label class="required" for="updated_at">{{ trans('cruds.blogPost.fields.updated_at') }}</label>
            <input class="form-control {{ $errors->has('updated_at') ? 'is-invalid' : '' }}"
                   type="text" name="updated_at" id="updated_at" value="{{ old('updated_at', $blogPost->updated_at) }}" readonly>

            @if($errors->has('updated_at'))
                <div class="invalid-feedback">
                    {{ $errors->first('updated_at') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.updated_at_helper') }}</span>
        </div>

        <div class="form-group col-md-12">

            <label class="required" for="tags">{{ trans('cruds.blogPost.fields.tags') }}</label>

            <div style="padding-bottom: 4px">
                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
            </div>

            <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple required>
                @foreach($tags as $id => $tag)
                    <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $blogPost->blogPostTags->contains($id)) ? 'selected' : '' }}>
                        {{ $tag }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('tags'))
                <div class="invalid-feedback">
                    {{ $errors->first('tags') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.tags_helper') }}</span>
        </div>

        <div class="form-group col-md-12">

            <label class="required" for="summary">{{ trans('cruds.blogPost.fields.summary') }}</label>

            <textarea class="form-control {{ $errors->has('summary') ? 'is-invalid' : '' }}"
                      name="summary" id="summary" required>{{ old('summary', $blogPost->summary) }}</textarea>

            @if($errors->has('summary'))
                <div class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.summary_helper') }}</span>
        </div>

        <div class="form-group col-md-12">

            <label class="required" for="body">{{ trans('cruds.blogPost.fields.body') }}</label>

            {{ Form::textarea('body',
                (isset($blogPost->body) ? $blogPost->body : ''),
                ['class' => 'form-control',
                'id' => 'body'])
            }}

            @if($errors->has('body'))
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.blogPost.fields.body_helper') }}</span>
        </div>

    </div>
</div>
