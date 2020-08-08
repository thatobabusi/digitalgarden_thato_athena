@extends('layouts.frontend.app_frontend_layout_no_sidebar')

@section('breadcrumbs')
    {{ Breadcrumbs::render('frontend.contact', 'contact') }}
@endsection

@section('content')

    <style>
        .with-errors {
            color: red !important;
        }
    </style>

    <section id="contact">
        <div class="container">
            <div class="row vcenter">
                <div class="col-md-12">
                    <h3 class="mt-3">{{$page->title}}</h3>
                    <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                </div>

                @foreach($page->systemPageSections as $page_section)
                    <div class="col-md-12">
                        <h3 class="mt-3">{{$page_section->title}}</h3>
                        <h4 class="mt-3">{{$page_section->header}}</h4>
                        <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                        <p class="lead">
                            {!! $page_section->subheader !!}
                        </p>
                        <p>
                            {!! $page_section->body !!}
                        </p>
                    </div>
                @endforeach
                <!-- / column -->

            </div>
            <!-- / row -->

        </div>
        <!-- / container -->

    </section>
    <!-- / contact -->

@endsection
