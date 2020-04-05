<div style="margin-bottom: 10px;" class="row">

    {{--Blog posts--}}
    <div class="btn-group col-lg-4" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog.index") }}">
            {{ trans('global.list') }} {{ trans('cruds.blogPost.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.blogPost.new_title') }}
        </a>
    </div>

    {{--Blog post categories--}}
    <div class="btn-group col-lg-4" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog-category.index") }}">
            {{ trans('global.list') }} {{ trans('cruds.blogPostCategory.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog-category.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.blogPostCategory.new_title') }}
        </a>
    </div>

    {{--Blog post tags--}}
    <div class="btn-group col-lg-4" role="group" aria-label="Button group with nested dropdown">
        <a class="btn btn-default" href="{{ route("admin.blog-tag.index") }}">
            {{ trans('global.list') }} {{ trans('cruds.blogPostTag.title') }}
        </a>
        <a class="btn btn-default" href="{{ route("admin.blog-tag.create") }}">
            {{ trans('global.add') }} {{ trans('cruds.blogPostTag.new_title') }}
        </a>
    </div>

</div>
