<nav class="navbar navbar-expand-lg navbar-dark d-print-none" >

    <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navigation" class="collapse navbar-collapse flex-column" >

        <div class="profile-section pt-3 pt-lg-0">

            @if(isset($resume->resumeProfilePhotos->first()->src))
                <img src="{{ URL::asset(''.$resume->resumeProfilePhotos->first()->src.'') }}"
                     alt="{{$resume->resumeProfilePhotos->first()->alt ?? 'Post Thumbnail'}}"
                     class="block-image-big">
            @else
                <img src="{{ URL::asset('images/resume/tbabusi-grey.png') }}"
                     class="block-image-big" alt="image">
            @endif

            <div class="bio mb-3">
                {{ $resume->headline ?? config('resume.headline')}}
            </div>
            <!--//bio-->

            @include('system_layouts.frontend.components_prof.sociallinks')
            <!--//social-list-->

            <hr>
        </div>
        <!--//profile-section-->

        @include('system_layouts.frontend.components_prof.menu')

    </div>

</nav>
