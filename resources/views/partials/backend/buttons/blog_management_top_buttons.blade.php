<div style="margin-bottom: 10px;" class="row">

    {{--Blog posts--}}
    <div class="btn-group col-lg-3" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog.index") }}">
            {{ trans('cruds.blogPost.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog.create") }}">
            {{ trans('global.add') }}
        </a>
    </div>

    {{--Blog post categories--}}
    <div class="btn-group col-lg-3" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog-category.index") }}">
            {{ trans('cruds.blogPostCategory.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog-category.create") }}">
            {{ trans('global.add') }}
        </a>
    </div>

    {{--Blog post images--}}
    <div class="btn-group col-lg-3" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog-tag.index") }}">
            {{ trans('cruds.blogPost.title_singular') }} {{ trans('cruds.image.title') }}
        </a>
        {{--<a class="btn btn-default" href="{{ route("admin.blog-tag.create") }}">
            {{ trans('global.add') }}
        </a>--}}
    </div>

    {{--Blog post tags--}}
    <div class="btn-group col-lg-3" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog-tag.index") }}">
            {{ trans('cruds.blogPostTag.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog-tag.create") }}">
            {{ trans('global.add') }}
        </a>
    </div>

</div>
