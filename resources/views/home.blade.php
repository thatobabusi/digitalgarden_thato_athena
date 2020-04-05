@extends('layouts.backend.app_layout_backend_admin')

@section('content')
<div class="content">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Library</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data</li>
        </ol>
    </nav>

    {{--<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>--}}

    <div class="row">
        @include('partials.backend.buttons.home_buttons')
    </div>

    <div class="row">
        @can('user_create')
            <div class="col-md-12">
            @include('partials.backend.buttons.blog_management_top_buttons')
            </div>
        @endcan
        @include('partials.backend.widgets.blog_posts')

        @include('partials.backend.widgets.blog_post_categories')

        @include('partials.backend.widgets.blog_post_tags')

    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection
