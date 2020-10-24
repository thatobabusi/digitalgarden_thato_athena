@extends('system_layouts.frontend.app_frontend_layout_professional')

@section('content')

    <header class="header text-center d-print-none">
        <div class="force-overflow">
            <h1 class="blog-name pt-lg-4 mb-0">
                <a href="#">
                    @if(isset($resume->firstname,$resume->surname))
                        {{ $resume->firstname . ' ' . $resume->surname }}
                    @else
                        {{ config('resume.full_name') }}
                    @endif
                </a>
            </h1>

            @include('system_layouts.frontend.components_prof.nav')
        </div>
        <!--//force-overflow-->
    </header>

    <div class="main-wrapper">
        <section class="cta-section theme-bg-light py-5 d-print-none">
            <div class="container text-center single-col-max-width">

                <h2 class="heading mb-3">
                    My Resume
                </h2>

                <a class="btn btn-primary"
                   href="#" {{--href="{{route('professional.my-resume.download')}}"--}} onclick="window.print()">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Download PDF Version
                </a>

                {{--<a class="btn btn-primary"
                   href="#" target="_blank">
                    <i class="fas fa-file-pdf mr-2"></i>
                    Download MS Word Version
                </a>--}}

            </div>
            <!--//container-->
        </section>

        <div class="container px-3 px-lg-5">
            <article class="resume-wrapper mx-auto theme-bg-light p-5 mb-5 my-5 shadow-lg">

                <div class="resume-header">

                    <div class="row align-items-center">
                        <div class="resume-title col-12 col-md-6 col-lg-8 col-xl-9">
                            <h2 class="resume-name mb-0 text-uppercase">
                                @if(isset($resume->firstname,$resume->surname))
                                    {{ $resume->firstname . ' ' . $resume->surname }}
                                @else
                                    {{ config('resume.full_name') }}
                                @endif
                            </h2>
                            <div class="resume-tagline mb-3 mb-md-0">
                                {{ $resume->job_title ?? config('resume.job_title') }}
                            </div>
                        </div>
                        <!--//resume-title-->

                        <div class="resume-contact col-12 col-md-6 col-lg-4 col-xl-3">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-phone-square fa-fw fa-lg mr-2 ">

                                    </i>
                                    <a class="resume-link" href="tel:#">
                                        {{ $resume->resumeContactDetails[0]->cell_number ?? config('resume.cv.cell_number') }}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-envelope-square fa-fw fa-lg mr-2"></i>
                                    <a class="resume-link" href="mailto:{{$resume->resumeContactDetails[0]->email ?? '#'}}">
                                        {{ $resume->resumeContactDetails[0]->email ?? config('resume.cv.email') }}
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-globe fa-fw fa-lg mr-2"></i>
                                    <a class="resume-link" href="#">
                                        {{ $resume->resumeContactDetails[0]->website ?? config('resume.cv.website') }}
                                    </a>
                                </li>
                                <li class="mb-0">
                                    <i class="fas fa-map-marker-alt fa-fw fa-lg mr-2"></i>
                                    {{ $resume->location ?? config('resume.cv.location') }}
                                </li>
                            </ul>
                        </div><!--//resume-contact-->
                    </div><!--//row-->

                </div><!--//resume-header-->
                <hr>

                <div class="resume-intro py-3">
                    <div class="media flex-column flex-md-row align-items-center">
                        <img src="{{ URL::asset('images/resume/tbabusi-grey.png') }}"
                             class="resume-profile-image mb-3 mb-md-0 mr-md-5 ml-md-0 rounded mx-auto" alt="image">
                        <div class="media-body text-left">
                            <p class="mb-0">
                                {!! $resume->about ?? config('resume.cv.about')  !!}
                            </p>
                        </div><!--//media-body-->
                    </div>
                </div><!--//resume-intro-->
                <hr>

                <div class="resume-body">
                    <div class="row">
                        <div class="resume-main col-12 col-lg-8 col-xl-9 pr-0 pr-lg-5">

                            <section class="work-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">
                                    Work Experience
                                </h3>

                                <?php $work_experience = $resume->resumeWorkDetails ?? config('resume.cv.work'); ?>

                                @foreach($work_experience as $work)
                                    <div class="item mb-3">
                                        <div class="item-heading row align-items-center mb-2">
                                            <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">
                                                {{$work['title']}}
                                            </h4>
                                            <div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">
                                                {{$work['company']}}  <br/>
                                                {{$work['dates']}}
                                            </div>

                                        </div>
                                        <div class="item-content">
                                            <p>
                                                {!! $work['details'] !!}
                                            </p>
                                        </div>
                                    </div><!--//item-->
                                @endforeach

                            </section><!--//work-section-->

                            {{--<section class="project-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Projects</h3>
                                <div class="item mb-3">
                                    <div class="item-heading row align-items-center mb-2">
                                        <h4 class="item-title col-12 col-md-6 col-lg-8 mb-2 mb-md-0">Project Lorem Ipsum</h4>
                                        <div class="item-meta col-12 col-md-6 col-lg-4 text-muted text-left text-md-right">Open Source</div>

                                    </div>
                                    <div class="item-content">
                                        <p>
                                            You can use this section for your side projects. You can
                                            <a href="#" class="theme-link">provide a project link here</a> as
                                           well. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ae
                                           nean commodo ligula eget dolor. Aenean massa. Cum sociis natoque pena
                                           tibus et magnis dis parturient montes, nascetur ridiculus mus.
                                        </p>


                                    </div>
                                </div>
                                <!--//item-->
                            </section>
                          <!--//project-section-->--}}

                        </div>
                        <!--//resume-main-->

                        <aside class="resume-aside col-12 col-lg-4 col-xl-3 px-lg-4 pb-lg-4">

                            <section class="skills-section py-3">

                                <h3 class="text-uppercase resume-section-heading mb-4">Skills</h3>
                                <div class="item">
                                    <h4 class="item-title">Technical</h4>
                                    <ul class="list-unstyled resume-skills-list">

                                        <?php $technical_skills = $resume->resumeSkills->where("resume_skill_type_id", 1) ?? config('resume.cv.skills'); ?>

                                        @foreach($technical_skills as $skill)
                                            <li class="mb-2">{{$skill->skill ?? $skill}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--//item-->

                                <div class="item">
                                    <h4 class="item-title">Professional</h4>
                                    <ul class="list-unstyled resume-skills-list">

                                        <?php $professional_skills = $resume->resumeSkills->where("resume_skill_type_id", 2) ?? config('resume.cv.professional_skills'); ?>

                                        @foreach($professional_skills as $skill)
                                            <li class="mb-2">{{$skill->skill ?? $skill}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!--//item-->

                            </section>
                            <!--//skills-section-->

                            <section class="education-section py-3">

                                <h3 class="text-uppercase resume-section-heading mb-4">Education</h3>
                                <ul class="list-unstyled resume-education-list">

                                    <?php $education_details = $resume->resumeEducationDetails ?? config('resume.cv.education'); ?>

                                    @foreach($education_details as $education)
                                        <li class="mb-3">
                                            <div class="resume-degree font-weight-bold">{{$education['qualification']}}</div>
                                            <div class="resume-degree-org text-muted">{{$education['school']}}</div>
                                            <div class="resume-degree-time text-muted">{{$education['dates']}}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>
                            <!--//education-section-->

                            <br/>
                            <section class="education-section py-3">

                                <h3 class="text-uppercase resume-section-heading mb-4">
                                    Licenses & Certifications
                                </h3>

                                <ul class="list-unstyled resume-awards-list">

                                    <?php $certifications = $resume->resumeLicenses ?? config('resume.cv.licenses_certifications'); ?>

                                    @foreach($certifications as $certification)
                                        <li class="mb-3">
                                            <div class="font-weight-bold">
                                                {{$certification['qualification']}}
                                            </div>
                                            <div class="text-muted">
                                                {{$certification['school']}} ({{$certification['dates']}})
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>

                            {{--<section class="education-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Awards</h3>
                                <ul class="list-unstyled resume-awards-list">
                                    <li class="mb-3">
                                        <div class="font-weight-bold">Award Lorem Ipsum</div>
                                        <div class="text-muted">Microsoft lorem ipsum (2019)</div>
                                    </li>
                                    <li>
                                        <div class="font-weight-bold">Award Donec Sodales</div>
                                        <div class="text-muted">Oracle Aenean (2017)</div>
                                    </li>
                                </ul>
                            </section>--}}
                            <!--//education-section-->

                            <br/>
                            <section class="skills-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Languages</h3>

                                <ul class="list-unstyled resume-lang-list">

                                    <?php $languages = $resume->resumeLanguages ?? config('resume.cv.languages'); ?>

                                    @foreach($languages as $language)
                                        <li class="mb-2">
                                            {{$language->language ?? $language}}
                                            <span class="text-muted">(Professional)</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </section>
                            <!--//certificates-section-->

                            <section class="skills-section py-3">
                                <h3 class="text-uppercase resume-section-heading mb-4">Interests</h3>
                                <ul class="list-unstyled resume-interests-list mb-0">

                                    <?php $interests = $resume->resumeInterests ?? config('resume.cv.interests'); ?>

                                    @foreach($interests as $interest)
                                        <li class="mb-2">{{$interest->title ?? $interest}}</li>
                                    @endforeach
                                </ul>
                            </section>
                            <!--//certificates-section-->

                        </aside>
                        <!--//resume-aside-->

                    </div>
                    <!--//row-->

                </div>
                  <!--//resume-body-->
                <hr>

                <div class="resume-footer text-center">
                    <ul class="resume-social-list list-inline mx-auto mb-0 d-inline-block text-muted">

                        <li class="list-inline-item mb-lg-0 mr-3">
                            <a class="resume-link" href="{{ config('social.social_media.Github.link') }}" target="_blank">
                                <i class="fab fa-github-square fa-2x mr-2" data-fa-transform="down-4"></i>
                                <span class="d-none d-lg-inline-block text-muted">
                                    {{ config('social.social_media.Github.link') }}
                                </span>
                            </a>
                        </li>

                        <li class="list-inline-item mb-lg-0 mr-3">
                            <a class="resume-link" href="{{ config('social.social_media.LinkedIn.link') }}" target="_blank">
                                <i class="fab fa-linkedin fa-2x mr-2" data-fa-transform="down-4"></i>
                                <span class="d-none d-lg-inline-block text-muted">
                                    {{ config('social.social_media.LinkedIn.link') }}
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item mb-lg-0 mr-lg-3">
                            <a class="resume-link" href="{{ config('social.social_media.Twitter.link') }}" target="_blank">
                                <i class="fab fa-twitter-square fa-2x mr-2" data-fa-transform="down-4"></i>
                                <span class="d-none d-lg-inline-block text-muted">
                                    {{ config('social.social_media.Twitter.link') }}
                                </span>
                            </a>
                        </li>
                    </ul>
                </div><!--//resume-footer-->

            </article>

        </div>
        <!--//container-->

        @include('system_layouts.frontend.components_prof.footer')

    </div>
    <!--//main-wrapper-->

@endsection

@section('js_bottom_scripts')
    <!-- Javascript -->
    <script src="{{ URL::asset('frontend_professional/core/plugins/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/plugins/popper.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ URL::asset('frontend_professional/core/plugins/tiny-slider/min/tiny-slider.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/js/testimonials.js') }}"></script>


    <!-- Style Switcher (REMOVE ON YOUR PRODUCTION SITE) -->
    <script src="{{ URL::asset('frontend_professional/core/js/demo/style-switcher.js') }}"></script>

    <!-- Dark Mode -->
    <script src="{{ URL::asset('frontend_professional/core/plugins/js-cookie.min.js') }}"></script>
    <script src="{{ URL::asset('frontend_professional/core/js/dark-mode.js') }}"></script>
@endsection
