<header class="page-header fixed-menu bg-secondary">
    <div class="page-header-inner">
        <div class="container">
            <div class="row vcenter">
                <div class="col-md-7">
                    <h1 class="page-title">

                        @if(isset($page_title, $page_header))
                            @if(Str::contains(Request::url(), '/blog/') === true)
                                {{$page_title ?? ''}}
                            @elseif(Str::contains(Request::url(), ['/blog-category/', '/blog-tag/', '/blog-archives/']) === true)
                                {{$page_header}} - {{ strtoupper($page_title ?? 'ALL') }}
                            @else
                                {{$page_header}}
                            @endif
                        @else
                            BLOG
                        @endif
                    </h1>
                </div>
                <!-- / column -->
                <div class="col-md-5 right-page-nav">
                    @yield('breadcrumbs')
                </div>
                <!-- / column -->
            </div>
            <!-- / row -->
        </div>
        <!-- / container -->
    </div>
    <!-- / page-header-inner -->
</header>
<!-- / page-header -->
