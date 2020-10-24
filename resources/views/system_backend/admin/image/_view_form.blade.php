<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.image.title_singular') }}
    </div>

    <div class="card-body">
        <div class="form-group">

            <div class="row col-md-12">

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.title') }}</label>
                    <p class="text">{{$image->title}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.slug') }}</label>
                    <p class="text">{{$image->slug}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.src') }}</label>
                    <p class="text">{{$image->src}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.mime_type') }}</label>
                    <p class="text">{{$image->mime_type}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.description') }}</label>
                    <p class="text">{{$image->description}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.alt') }}</label>
                    <p class="text">{{$image->alt}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.credits') }}</label>
                    <p class="text">{{$image->credits_if_applicable}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.base64') }}</label>
                    <p class="text">{{$image->base64}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.created_at') }}</label>
                    <p class="text">{{$image->created_at}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.image.fields.updated_at') }}</label>
                    <p class="text">{{$image->updated_at}}</p>
                </div>

                <div class="form-group col-md-12 text-center">
                    <label class="required" for="title">{{ trans('cruds.image.title_singular') }}</label>
                    <p class="col-md-12">
                        <img src="{{isset($image->src) ? URL::asset(''.$image->src.'') : '#'}}"
                             class="img-responsive col-md-12" alt="{{$image->alt ?? 'Image Thumbnail'}}"  />
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
