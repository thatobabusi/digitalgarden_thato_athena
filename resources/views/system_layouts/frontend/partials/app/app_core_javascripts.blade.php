<!-- Core JavaScript -->
<script src="{{ URL::asset('frontend_theme/basix/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="{{ URL::asset('frontend_theme/basix/js/bootstrap.min.js') }}"></script>
<!-- / Core JavaScript -->

<!-- preloader -->
<script src="{{ URL::asset('frontend_theme/basix/js/preloader.js') }}"></script>
<!-- / preloader -->

<!-- Smooth Scrolling -->
<script src="{{ URL::asset('frontend_theme/basix/js/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('frontend_theme/basix/js/smooth-scroll.js') }}"></script>
<!-- / Smooth Scrolling -->

<!-- Tooltips -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<!-- / Tooltips -->

<!-- Owl Carousel -->
<script src="{{ URL::asset('frontend_theme/basix/js/owl.carousel.min.js') }}"></script>
<script>
    $('#slider-post').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        items:1,
        animateIn: 'slideInRight',
        animateOut: 'slideOutLeft'
    })
</script>
<!-- / Owl Carousel -->

<!-- Hide Nav -->
<script src="{{ URL::asset('frontend_theme/basix/js/hide-nav.js') }}"></script>
<!-- / Hide Nav -->

<script>
    /*Overlays*/
    $('#flash-overlay-modal').modal();

    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>
