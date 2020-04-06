<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <div class="row col-md-12">

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.id') }}</label>
                    <p class="text">{{$blogPost->id ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.title') }}</label>
                    <p class="text">{{$blogPost->title ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.slug') }}</label>
                    <p class="text">{{$blogPost->slug ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.author') }}</label>
                    <p class="text">{{$blogPost->blogPostAuthor->name ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.created_at') }}</label>
                    <p class="text">{{$blogPost->created_at ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.updated_at') }}</label>
                    <p class="text">{{$blogPost->updated_at ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.category') }}</label>
                    <p class="text">{{$blogPost->blogPostCategory->title ?? ''}}</p>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.tags') }}</label>
                    <p class="text">
                        @foreach($blogPost->blogPostTags as $key => $item)
                            {{--<a class="btn btn-xs btn-default" href="#">
                                {{ $item->title ?? '' }}
                            </a>--}}
                            <span class="badge badge-info">{{ $item->title }}</span>
                        @endforeach
                    </p>
                </div>

                <div class="form-group col-md-12 text-center">
                    <label class="required" for="title">{{ trans('cruds.image.title_singular') }}</label>
                    <p class="col-md-12">
                        <img src="{{isset($blogPostImage->src) ? URL::asset(''.$blogPostImage->src.'') : '#'}}"
                             class="img-responsive col-md-12" alt="{{$blogPostImage->alt ?? 'Image Thumbnail'}}" />
                    </p>
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.summary') }}</label>
                    <p class="text">{!! $blogPost->summary !!}</p>
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="title">{{ trans('cruds.blogPost.fields.body') }}</label>
                    <p class="text">{!! $blogPost->body !!}</p>
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
