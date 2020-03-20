@extends('layouts.backend.app_layout_backend_admin')
@section('content')

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
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.id') }}
                        </th>
                        <td>
                            {{ $blogPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.title') }}
                        </th>
                        <td>
                            {{ $blogPost->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.slug') }}
                        </th>
                        <td>
                            {{ $blogPost->slug ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.author') }}
                        </th>
                        <td>
                            {{ $blogPost->blogPostAuthor->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.created_at') }}
                        </th>
                        <td>
                            {{ $blogPost->created_at ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $blogPost->updated_at ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.category') }}
                        </th>
                        <td>
                            {{ $blogPost->blogPostCategory->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.tags') }}
                        </th>
                        <td>
                            @foreach($blogPost->blogPostTags as $key => $item)
                                {{--<a class="btn btn-xs btn-default" href="#">
                                    {{ $item->title ?? '' }}
                                </a>--}}
                                <span class="badge badge-info">{{ $item->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.summary') }}
                        </th>
                        <td>
                            {!! $blogPost->summary !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.body') }}
                        </th>
                        <td>
                            {!! $blogPost->body !!}
                        </td>
                    </tr>
                    {{--<tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.roles') }}
                        </th>
                        <td>
                            @foreach($blogPost->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>--}}
                    {{--<tr>
                        <th>
                            {{ trans('cruds.blogPost.fields.class') }}
                        </th>
                        <td>
                            {{ $user->class->name ?? '' }}
                        </td>
                    </tr>--}}
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blog.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

{{--<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#teacher_lessons" role="tab" data-toggle="tab">
                {{ trans('cruds.lesson.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="teacher_lessons">
            @includeIf('admin.users.relationships.teacherLessons', ['lessons' => $user->teacherLessons])
        </div>
    </div>
</div>--}}

@endsection
