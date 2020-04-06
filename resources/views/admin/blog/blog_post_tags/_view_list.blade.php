<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blogPostTag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.blogPostTag.fields.updated_at') }}
                        </th>
                        <th>
                            &nbsp;Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogPostTags as $key => $tag)
                        <tr data-entry-id="{{ $tag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tag->id ?? '' }}
                            </td>
                            <td>
                                {{ $tag->title ?? '' }}
                            </td>
                            <td>
                                {{ $tag->slug ?? '' }}
                            </td>
                            <td>
                                {{ $tag->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $tag->updated_at ?? '' }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    @can('user_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.blog-tag.show', $tag->slug) }}"
                                           type="button">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('user_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.blog-tag.edit', $tag->slug) }}"
                                           type="button">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('user_delete')
                                        <a class="btn btn-xs btn-danger" href="#" type="button">
                                            <form action="{{ route('admin.blog-tag.destroy', $tag->id) }}"
                                                  method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                  style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        </a>
                                    @endcan
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
