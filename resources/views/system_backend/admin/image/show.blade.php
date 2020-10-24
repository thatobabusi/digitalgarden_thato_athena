@extends('system_layouts.backend.app_layout_backend_admin')

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.image.show', $image) }}
@endsection

@section('content')

    @yield('breadcrumbs')

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

                @include('system_backend.admin.image._view_form')

                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.image.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
