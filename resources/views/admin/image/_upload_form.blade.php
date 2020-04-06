<div class="row">
    <div class="col-md-6 row">
        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.title') }}</label>

            <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('title') }}" required>

            @if($errors->has('title'))
                <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.title_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.image_type') }}</label>

            <input class="form-control {{ $errors->has('image_type') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('image_type') }}" required>

            @if($errors->has('image_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('image_type') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.image_type_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.src') }}</label>

            <input class="form-control {{ $errors->has('src') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('src') }}" required>

            @if($errors->has('src'))
                <div class="invalid-feedback">
                    {{ $errors->first('src') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.src_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.alt') }}</label>

            <input class="form-control {{ $errors->has('src') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('alt') }}" required>

            @if($errors->has('alt'))
                <div class="invalid-feedback">
                    {{ $errors->first('alt') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.alt_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.mime_type') }}</label>

            <input class="form-control {{ $errors->has('mime_type') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('mime_type') }}" required>

            @if($errors->has('mime_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('mime_type') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.mime_type_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.description') }}</label>

            <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('description') }}" required>

            @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.description_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.base64') }}</label>

            <input class="form-control {{ $errors->has('base64') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('base64') }}" required>

            @if($errors->has('base64'))
                <div class="invalid-feedback">
                    {{ $errors->first('base64') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.base64_helper') }}</span>
        </div>

        <div class="form-group col-md-6">

            <label class="required" for="title">{{ trans('cruds.image.fields.credits') }}</label>

            <input class="form-control {{ $errors->has('credits') ? 'is-invalid' : '' }}"
                   type="text" name="title" id="title" value="{{ old('credits') }}" required>

            @if($errors->has('credits'))
                <div class="invalid-feedback">
                    {{ $errors->first('credits') }}
                </div>
            @endif

            <span class="help-block">{{ trans('cruds.image.fields.credits_helper') }}</span>
        </div>

    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label>Upload Image</label>
            <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="imgInp">
                </span>
            </span>
                <input type="text" class="form-control" readonly>
            </div>
            <img id='img-upload'/>
        </div>

    </div>
</div>

{{--<div class="row col-md-12">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2>Image upload example</h2>
        </div>

        <div class="panel-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                <img src="images/{{ Session::get('image') }}">
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>--}}
