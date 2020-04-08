@extends('layouts.backend.app_layout_backend_admin')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.image.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            @include('admin.image._view_form')

            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image.index') }}">
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
