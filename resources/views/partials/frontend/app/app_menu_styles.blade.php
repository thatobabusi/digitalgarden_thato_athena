<style>
    #navbar {
        overflow: hidden;
        background-color: #f2f2f2 !important;
        z-index: 999999 !important;
    }

    /* Navbar links */
    #navbar a {
        float: left;
        display: block;
        color: #f2f2f2 !important;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        z-index: 999999 !important;
    }

    /* Page content */
    .page-content {
        padding: 16px;
    }

    /* The sticky class is added to the navbar with JS when it reaches its scroll position */
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999999 !important;
    }

    /* Add some top padding to the page content to prevent sudden quick movement (as the navigation bar gets a new position at the top of the page (position:fixed and top:0) */
    .sticky + .page-content {
        padding-top: 30px;
    }

    #scrollToTopButton {
        display: none; /* Hidden by default */
        position: fixed; /* Fixed/sticky position */
        bottom: 20px; /* Place the button at the bottom of the page */
        right: 30px; /* Place the button 30px from the right */
        z-index: 99; /* Make sure it does not overlap */
        border: none; /* Remove borders */
        outline: none; /* Remove outline */
        /*background-color: red;*/ /* Set a background color */
        color: white; /* Text color */
        cursor: pointer; /* Add a mouse pointer on hover */
        padding: 15px; /* Some padding */
        border-radius: 10px; /* Rounded corners */
        font-size: 18px; /* Increase font size */
    }

    #scrollToTopButton:hover {
        background-color: #555; /* Add a dark-grey background on hover */
    }
</style>


