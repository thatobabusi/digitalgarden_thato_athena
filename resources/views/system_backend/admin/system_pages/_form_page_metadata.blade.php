
<div class="card">
    @if(isset($system_page_metadata->id))
    <form enctype="multipart/form-data" method="POST" action="{{ route("admin.system-page-metadata.update", [$system_page_metadata->id]) }}">
        @method('PUT')
        @csrf
    @endif

        <div class="card-header">
            Meta Data
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="required" for="meta_title">Meta Data Title</label>
                        <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}"
                               type="text" name="meta_title" id="meta_title" value="{{ $system_page_metadata->title ?? old('meta_title') }}" required placeholder="Meta Data Title">
                        @if($errors->has('meta_title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_title') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="meta_author">Meta Data Author</label>
                        <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}"
                               type="text" name="meta_author" id="meta_author"
                               value="{{ isset($system_page_metadata->author) ? $system_page_metadata->author : config('app.app_developer_name') ?? old('meta_author') }}" required placeholder="Meta Data Author">

                        @if($errors->has('meta_author'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_author') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="meta_keywords">Meta Data Keywords <small>*(seperate by single commas)</small></label>
                        <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}"
                               type="text" name="meta_keywords" id="meta_keywords" placeholder="Meta Data Keywords"
                               value="{{ $system_page_metadata->keywords ?? old('meta_keywords', null) }}" >

                        @if($errors->has('meta_keywords'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_keywords') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.blogPost.fields.created_at_helper') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="meta_robots">Meta Robots</label>
                        <select class="form-control select2 {{ $errors->has('meta_robots') ? 'is-invalid' : '' }}"
                                name="meta_robots" id="meta_robots" required>

                            @foreach(config('app.static_meta_robots') as $id => $robot)
                                <option value="{{ $id }}" {{ isset($system_page_metadata->robots) && $system_page_metadata->robots == $id ? 'selected' : '' }}>
                                    {{ $robot }}
                                </option>
                            @endforeach
                        </select>

                        @if($errors->has('meta_robots'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_robots') }}
                            </div>
                        @endif

                        <span class="help-block">{{ trans('cruds.blogPost.fields.slug_helper') }}</span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="required" for="meta_description">Meta Data Description</label>
                        <input class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}"
                               type="text" name="meta_description" id="meta_description" placeholder="Meta Data Description"
                               value="{{ $system_page_metadata->description ?? old('meta_description', null ) }}" >

                        @if($errors->has('meta_description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('meta_description') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.blogPost.fields.updated_at_helper') }}</span>
                    </div>
                </div>
            </div>
        </div>

    @if(isset($system_page_metadata->id))
        <div class="card-footer">
            <button class="btn btn-success" type="submit">
                {{ trans('global.save') }}
            </button>
        </div>
    </form>
    @endif
</div>
