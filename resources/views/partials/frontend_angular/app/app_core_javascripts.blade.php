<script src="{{ URL::asset('template/assets/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ URL::asset('template/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('template/assets/js/plugins/easing/jquery.easing.min.js') }}"></script>
<script src="{{ URL::asset('template/assets/js/plugins/twitter/twitterFetcher.min.js') }}"></script>
<script src="{{ URL::asset('template/assets/js/bravana-lite.js') }}"></script>
<script src="{{ URL::asset('js/lightwidget.js') }}"></script>
<script>
    //Get the button:
    mybutton = document.getElementById("scrollToTopButton");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    function scrollWinTop() {
        window.scrollTo(0, 0);
    }
</script>
