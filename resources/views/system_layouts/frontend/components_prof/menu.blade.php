<ul class="navbar-nav flex-column text-left">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('professional.about-me')}}">
            <i class="fas fa-user fa-fw mr-2"></i>
            About Me
            <span class="sr-only">(current)</span>
        </a>
    </li>
    {{--<li class="nav-item">
        <a class="nav-link" href="portfolio.html"><i class="fas fa-laptop-code fa-fw mr-2"></i>Portfolio</a>
    </li>--}}
    {{--<li class="nav-item">
        <a class="nav-link" href="services.html"><i class="fas fa-briefcase fa-fw mr-2"></i>Services &amp; Pricing</a>
    </li>--}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('professional.my-resume')}}">
            <i class="fas fa-file-alt fa-fw mr-2"></i>
            Resume
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('frontend.viewBlogHome')}}">
            <i class="fas fa-blog fa-fw mr-2"></i>
            Blog
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('frontend.contact')}}">
            <i class="fas fa-envelope-open-text fa-fw mr-2"></i>
            Contact
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('frontend.home')}}">
            <i class="fas fa-globe fa-fw mr-2"></i>
            Main Site
        </a>
    </li>

</ul>
