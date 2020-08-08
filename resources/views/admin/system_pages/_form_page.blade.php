<div class="col-md-12" {{--style="border: 1px solid #f0f3f5 !important;"--}}>
    <div class="row">
        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.blogPost.fields.title') }}</label>

            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ $system_page->title ?? old('title') }}" required>

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
                   type="text" name="slug" id="slug" value="{{ $system_page->slug ?? old('slug') }}" required>

            @if($errors->has('slug'))
                <div class="invalid-feedback">
                    {{ $errors->first('slug') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="slug">Page Category</label>
            <select class="form-control select2 {{ $errors->has('system_page_category_id') ? 'is-invalid' : '' }}"
                    name="system_page_category_id" id="system_page_category_id" required>

                @foreach($system_page_categories_list as $id => $categories)
                    <option value="{{ $id }}" {{ isset($system_page->system_page_category_id) && $system_page->system_page_category_id == $id ? 'selected' : '' }}>
                        {{ $categories }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('system_page_category_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('system_page_category_id') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
        </div>

        <div class="form-group col-md-6">
            <label class="required" for="status">Status <small>*(only publishable when all data is filled)</small></label>

            <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}"
                    name="status" id="status" required>

                @foreach(config('app.static_statusses') as $id => $status)
                    <option value="{{ $id }}" {{ isset($system_page->status) && $system_page->status == $id ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>

            @if($errors->has('status'))
                <div class="invalid-feedback">
                    {{ $errors->first('status') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="system_page_description">Page Description</label>
            <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                   type="text" name="description" id="description" placeholder="Page Description"
                   value="{{ $system_page->description ?? old('description', null ) }}" >

            @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.updated_at_helper') }}</span>
        </div>

        <div class="form-group col-md-3">

            <label class="required" for="created_at">{{ trans('cruds.blogPost.fields.created_at') }}</label>

            <input class="form-control {{ $errors->has('created_at') ? 'is-invalid' : '' }}"
                   type="text" name="created_at" id="created_at" placeholder="{{\Carbon\Carbon::now()}}"
                   value="{{ $system_page->created_at ?? old('created_at', null) }}" readonly>

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
                   type="text" name="updated_at" id="updated_at" placeholder="{{\Carbon\Carbon::now()}}"
                   value="{{ $system_page->updated_at ?? old('updated_at', null ) }}" readonly>

            @if($errors->has('updated_at'))
                <div class="invalid-feedback">
                    {{ $errors->first('updated_at') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.updated_at_helper') }}</span>
        </div>

        {{--<div class="form-group col-md-12">

            <label class="required" for="summary">{{ trans('cruds.blogPost.fields.summary') }}</label>

            {{Form::textarea('summary', (isset($blogPost->summary) ? $blogPost->summary : ''),['class' => 'form-control','id' => 'summary'])}}

            @if($errors->has('summary'))
                <div class="invalid-feedback">
                    {{ $errors->first('summary') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.blogPost.fields.summary_helper') }}</span>
        </div>--}}

        {{--<div class="form-group col-md-12">

            <label class="required" for="body">{{ trans('cruds.blogPost.fields.body') }}</label>

            {{Form::textarea('body', (isset($blogPost->body) ? $blogPost->body : ''),['class' => 'form-control','id' => 'body'])}}

            @if($errors->has('body'))
                <div class="invalid-feedback">
                    {{ $errors->first('body') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.blogPost.fields.body_helper') }}</span>
        </div>--}}
    </div>
</div>

