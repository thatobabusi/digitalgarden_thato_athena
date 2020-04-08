<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPostCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog-category.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <div class="row col-md-12">

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostCategory.fields.title') }}</label>
                    <p class="text">{{$blogPostCategory->title ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostCategory.fields.slug') }}</label>
                    <p class="text">{{$blogPostCategory->slug ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostCategory.fields.created_at') }}</label>
                    <p class="text">{{$blogPostCategory->created_at ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPostCategory.fields.updated_at') }}</label>
                    <p class="text">{{$blogPostCategory->updated_at ?? ''}}</p>
                </div>


            </div>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
