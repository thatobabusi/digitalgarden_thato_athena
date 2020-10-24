<section class="about-me-section p-3 p-lg-5 theme-bg-light">

    <div class="container">
        <div class="profile-teaser media flex-column flex-lg-row">

            <div class="media-body">

                <h2 class="name font-weight-bold mb-1">
                    @if(isset($resume->firstname,$resume->surname))
                        {{ $resume->firstname . ' ' . $resume->surname }}
                    @else
                        {{ config('resume.full_name') }}
                    @endif
                </h2>

                <div class="tagline mb-3">
                    {{ $resume->job_title ?? config('resume.job_title')}}
                </div>

                <div class="bio mb-4">
                    {!! $resume->bio ?? config('resume.bio') !!}
                </div>
                <!--//bio-->

                <div class="mb-4">

                    {{--<a class="btn btn-primary mr-2 mb-3" href="portfolio.html">
                        <i class="fas fa-arrow-alt-circle-right mr-2"></i>
                        <span class="d-none d-md-inline">
                            View
                        </span>
                        Portfolio
                    </a>--}}

                    <a class="btn btn-secondary mb-3" href="{{route('professional.my-resume')}}">
                        <i class="fas fa-file-alt mr-2"></i>
                        <span class="d-none d-md-inline">
                            View
                        </span>
                        Resume
                    </a>

                </div>
            </div>
            <!--//media-body-->
        </div>
    </div>
</section>
<!--//about-me-section-->
