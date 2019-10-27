<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-bars"></i>
        </button>
        <a href="index.html" class="navbar-brand">
            {{ config('app.name', 'Laravel') }}
            {{--<img src="template/assets/img/logo/bravana-lite-logo.png" alt="Bravana Logo">--}}
        </a>
        <div id="main-nav-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-navbar-nav">
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">HOME <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="index.html">Home Default</a></li>
                        <li class="active"><a href="index-blog.html">Home Blog</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">FEATURES <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="features-hero-image-full.html">Fullscreen Image Background</a></li>
                        <li><a href="features-footer-newsletter-dark.html">Footer Newsletter (Dark)</a></li>
                    </ul>
                </li>
                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="page-about.html">About</a></li>
                        <li><a href="page-services.html">Services</a></li>
                        <li><a href="page-contact.html">Contact</a></li>
                    </ul>
                </li>
                <li><a href="blog-single-post.html">BLOG POST</a></li>
                <li>
                    <a href="https://www.themeineed.com/downloads/bravana-responsive-website-template/?utm_source=bravanalite&utm_medium=button&utm_campaign=bravana" target="_blank" class="btn-navbar"><span><i class="fa fa-rocket"></i> UPGRADE TO PRO</span></a>
                </li>
            </ul>
        </div>
        <!-- END MAIN NAVIGATION -->
    </div>
</nav>
