<!-- HEADER -->
<header>
    <div class="animatedParent animateOnce">
        <div class="nav-back animated fadeInDown">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="hedone-menu-header">
                                <div class="nav-button">
                                    <i class="fa fa-bars"></i>
                                </div>
                                <!-- SITE LOGO -->
                                <div class="site-branding">
                                    {{--<a href="index.html">
                                        <img src="{{ asset('hmtl_theme/hedone/assets/img/site-logo.png') }}" alt="brand logo"/>
                                    </a>--}}
                                    <h3>thatobabusi.co.za</h3>
                                    {{--<h3>Project Atlas</h3>--}}
                                </div>
                            </div>
                            <!-- PRIMARY MENU -->
                            @include('layouts.frontend.menu')
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- HEADER END -->
