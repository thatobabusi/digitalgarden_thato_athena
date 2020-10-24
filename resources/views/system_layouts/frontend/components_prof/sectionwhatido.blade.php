<section class="overview-section p-3 p-lg-5">
    <div class="container">

        <h2 class="section-title font-weight-bold mb-3">
            What I do
        </h2>

        <div class="section-intro mb-5">
            {!! $resume->bio_what_i_do ?? config('resume.bio_what_i_do') !!}
        </div>

        <h2 class="section-title font-weight-bold mb-3">
            Dev Stack and Tools
        </h2>

        <div class="row">
            @include('system_layouts.frontend.components_prof.devstack')
        </div>
        <!--//row-->

        {{--<div class="text-center py-3">
            <a href="#" class="btn btn-primary">
                <i class="fas fa-arrow-alt-circle-right mr-2"></i>
                Services &amp; Pricing
            </a>--}}
        </div>

    </div><!--//container-->
</section>
