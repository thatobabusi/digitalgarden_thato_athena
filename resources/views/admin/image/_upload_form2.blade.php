
<div class="col-md-12">

    <div class="col-lg-12 mx-auto rounded-bottom rounded-top" style="border: solid 1px #e4e7ea !important;">

        <label class="required" for="title">{{ trans('cruds.image.title_create') }}</label>

        <!-- Upload image input-->
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">

            <input name="upload" id="upload" type="file" onchange="readURL(this);" class="form-control border-0"
            value="{{isset($blogPostImage->id) ?$blogPostImage : null}}">

            @if($errors->has('upload'))
                <div class="invalid-feedback">
                    {{ $errors->first('upload') }}
                </div>
            @endif

            <span class="help-block">
                {{ trans('cruds.blogPost.fields.title_helper') }}
            </span>

            <label id="upload-label" for="upload" class="font-weight-light text-muted">
                {{ trans('cruds.image.choose_file') }}
            </label>

            <div class="input-group-append">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                    <small class="text-uppercase font-weight-bold text-muted">
                        {{ trans('cruds.image.choose_file') }}
                    </small>
                </label>
            </div>

        </div>

        <!-- Uploaded image area-->
        <p class="font-italic text-black text-center">
            {{ trans('cruds.image.choose_file_helper') }}
        </p>

        <div class="image-area mt-4">
            <img id="imageResult" src="{{isset($blogPostImage->src) ? URL::asset(''.$blogPostImage->src.'') : '#'}}"
                 alt="{{$blogPostImage->alt ?? 'Image Thumbnail'}}" class="img-fluid rounded shadow-sm mx-auto d-block">
        </div>

    </div>

</div>
