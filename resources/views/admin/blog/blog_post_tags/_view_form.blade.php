<div class="card">
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

            <div class="row col-md-12">

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostTag.fields.title') }}</label>
                    <p class="text">{{$blogPostTag->title ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostTag.fields.slug') }}</label>
                    <p class="text">{{$blogPostTag->slug ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostTag.fields.created_at') }}</label>
                    <p class="text">{{$blogPostTag->created_at ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostTag.fields.updated_at') }}</label>
                    <p class="text">{{$blogPostTag->updated_at ?? ''}}</p>
                </div>


            </div>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-tag.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
