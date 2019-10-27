@extends('layouts.frontend.app')
{{--<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | Bravana - Responsive Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Website Template">
    <meta name="author" content="The Develovers">
    <!-- CORE CSS -->
    <link href="template/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="template/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="template/assets/css/elegant-icons.css" rel="stylesheet" type="text/css">
    <!-- THEME CSS -->
    <link href="template/assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="template/assets/css/my-custom-styles.css" rel="stylesheet" type="text/css">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:700,400,400italic,500' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,300,300italic' rel='stylesheet' type='text/css'>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="template/assets/ico/bravana144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="template/assets/ico/bravana114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="template/assets/ico/bravana72.png">
    <link rel="apple-touch-icon-precomposed" href="template/assets/ico/bravana57.png">
    <link rel="shortcut icon" href="template/assets/ico/favicon.ico">
</head>--}}

<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    {{--<nav class="navbar navbar-default navbar-fixed-top ">
        <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <i class="fa fa-bars"></i>
            </button>
            <a href="index.html" class="navbar-brand">
                <img src="template/assets/img/logo/bravana-lite-logo.png" alt="Bravana Logo">
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
    </nav>--}}
    <!-- END NAVBAR -->

    {{--<div class="page-content">
        <div class="container">
            <div class="row">
                <!-- MAIN CONTENT -->
                <div class="col-md-8 col-lg-9">
                    <!-- latest posts -->
                    <section class="no-padding-top">
                        <div class="entry-post entry-post-fullwidth">
                            <figure class="media">
                                <a href="blog-single-post.html">
                                    <img src="template/assets/img/blog/blog-full-img.jpg" class="img-responsive" alt="Image Thumbnail" />
                                </a>
                            </figure>
                            <div class="entry-content">
                                <div class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="blog-single.html">Objectively Disseminate Customer Directed E-commerce</a>
                                    </h2>
                                    <div class="meta-line">
                                        <span class="post-date"><i class="fa fa-calendar"></i> Jan 14, 2016</span>
                                        <span class="post-comment"><i class="fa fa-comments"></i> <a href="#">35 Comments</a></span>
                                    </div>
                                </div>
                                <div class="excerpt">
                                    <p>Proactively reinvent team building customer service with ethical e-markets. Professionally utilize mission-critical technology whereas competitive solutions. Completely underwhelm go forward leadership without maintainable initiatives. Objectively disseminate customer directed e-commerce with prospective partnerships. Collaboratively actualize revolutionary total linkage before orthogonal catalysts for change. Appropriately facilitate optimal meta-services whereas end-to-end solutions...</p>
                                    <p class="read-more">
                                        <a href="#" class="read-more">Read More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix margin-top-30 margin-bottom-30"></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img3.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Enthusiastically disseminate resource</a></h3>
                                        <p class="post-excerpt">Appropriately productize extensive best practices vis-a-vis focused interfaces. Objectively extend compelling e-tailers rather ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 13, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img4.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Assertively foster communities</a></h3>
                                        <p class="post-excerpt">Dynamically customize enabled schemas vis-a-vis impactful customer service. Seamlessly integrate future-proof total linkage via ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 15, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Synergistically monetize functional niches</a></h3>
                                        <p class="post-excerpt">Globally grow timely testing procedures through flexible processes. Credibly expedite effective systems with strategic quality vectors ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 15, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img2.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Conveniently monetize customer directed</a></h3>
                                        <p class="post-excerpt">Competently leverage existing multimedia based testing procedures after tactical e-services. Holisticly parallel task cross-media ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 14, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img6.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Monotonectally incubate process services</a></h3>
                                        <p class="post-excerpt">Distinctively revolutionize go forward schemas and focused technologies. Appropriately recaptiualize performance based initiatives after 24/7 scenarios ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 15, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="post-entry-card">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img10.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <div class="post-info">
                                        <h3 class="post-title"><a href="#">Completely synthesize multimedia based</a></h3>
                                        <p class="post-excerpt">Quickly promote corporate supply chains and B2C models. Continually maximize just in time catalysts for changed testing task ...</p>
                                        <span class="post-meta"><i class="fa fa-calendar-o"></i> Jan 15, 2016</span>
                                        <a href="#" class="read-more pull-right">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- end latest posts -->

                    <!-- categorized posts -->
                    <section class="categorized-posts">
                        <h2 class="section-heading pull-left">CREATIVE</h2>
                        <a href="#" class="see-all-posts pull-right">See all posts in Creative <i class="fa fa-long-arrow-right"></i></a>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img10.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Globally benchmark holistic ideas for technologies</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img9.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Completely incubate high-quality e-markets</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img8.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Assertively mesh best-of-breed e-business</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img7.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Holisticly redefine pandemic infrastructures</a></h3>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- end categorized posts -->

                    <!-- categorized posts -->
                    <section class="categorized-posts">
                        <h2 class="section-heading pull-left">POPULAR</h2>
                        <a href="#" class="see-all-posts pull-right">See all posts in Popular <i class="fa fa-long-arrow-right"></i></a>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img6.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Globally benchmark holistic ideas for technologies</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img5.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Completely incubate high-quality e-markets</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img4.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Assertively mesh best-of-breed e-business</a></h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="post-entry post-entry-simple">
                                    <a href="#"><img src="template/assets/img/blog/blog-med-img3.jpg" class="img-responsive" alt="Post Thumbnail"></a>
                                    <h3 class="post-title"><a href="#">Holisticly redefine pandemic infrastructures</a></h3>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- end categorized posts -->
                </div>
                <!-- END MAIN CONTENT -->

                <!-- SIDEBAR CONTENT -->
                <div class="col-md-4 col-lg-3">
                    <div class="sidebar">
                        <!-- widget -->
                        <div class="widget">
                            <h4 class="sr-only">SEARCH</h4>
                            <form method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="ex: bootstrap theme">
                                    <span class="input-group-btn"><button class="btn btn-primary" type="button"><span>GO</span></button>
										</span>
                                </div>
                            </form>
                        </div>
                        <!-- end widget -->
                        <!-- widget -->
                        <div class="widget">
                            <h4 class="widget-title">RECOMMENDED</h4>
                            <ul class="list-unstyled recommended-posts">
                                <li>
                                    <div class="post-entry-sidebar clearfix">
                                        <a href="#" class="left"><img src="template/assets/img/blog/blog-home-img-sidebar1.png" alt="Post Thumbnail"></a>
                                        <div class="right">
                                            <h4 class="media-heading post-title"><a href="#">Appropriately incubate ethical innovation before client-based information</a></h4>
                                            <span class="timestamp">1h ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-entry-sidebar clearfix">
                                        <a href="#" class="left"><img src="template/assets/img/blog/blog-home-img-sidebar2.png" alt="Post Thumbnail"></a>
                                        <div class="right">
                                            <h4 class="media-heading post-title"><a href="#">Conveniently synergize leading-edge metrics after quality processes</a></h4>
                                            <span class="timestamp">2h ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-entry-sidebar clearfix">
                                        <a href="#" class="left"><img src="template/assets/img/blog/blog-home-img-sidebar3.png" alt="Post Thumbnail"></a>
                                        <div class="right">
                                            <h4 class="media-heading post-title"><a href="#">Completely redefine seamless manufactured products</a></h4>
                                            <span class="timestamp">5h ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-entry-sidebar clearfix">
                                        <a href="#" class="left"><img src="template/assets/img/blog/blog-home-img-sidebar4.png" alt="Post Thumbnail"></a>
                                        <div class="right">
                                            <h4 class="media-heading post-title"><a href="#">Uniquely transition emerging markets without quality</a></h4>
                                            <span class="timestamp">1d ago</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="post-entry-sidebar clearfix">
                                        <a href="#" class="left"><img src="template/assets/img/blog/blog-home-img-sidebar5.png" alt="Post Thumbnail"></a>
                                        <div class="right">
                                            <h4 class="media-heading post-title"><a href="#">Rapidiously iterate next-generation quality vectors</a></h4>
                                            <span class="timestamp">18h ago</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end widget -->
                        <!-- widget -->
                        <div class="widget">
                            <h4 class="widget-title">CATEGORIES</h4>
                            <ul class="list-unstyled category-list">
                                <li><a href="#">Business (23)</a></li>
                                <li>
                                    <a href="#">Creative (14)</a>
                                    <ul class="list-unstyled sub-category-list">
                                        <li><a href="#">Digital Imaging (8)</a></li>
                                        <li><a href="#">Web Design (6)</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Media (65)</a></li>
                                <li><a href="#">Photography (17)</a></li>
                                <li><a href="#">Corporate (9)</a></li>
                            </ul>
                        </div>
                        <!-- end widget -->
                        <!-- widget -->
                        <div class="widget">
                            <h4 class="widget-title">WORKING TWITTER FEED</h4>
                            <div class="section twitter-stream">
                                <div id="tweets"></div>
                            </div>
                        </div>
                        <!-- end widget -->

                        <!-- widget -->
                        <div class="widget">
                            <h3 class="widget-title">TAGS</h3>
                            <ul class="list-inline tag-list">
                                <li><a href="#">story</a></li>
                                <li><a href="#">inspiration</a></li>
                                <li><a href="#">creative</a></li>
                                <li><a href="#">e-commerce</a></li>
                                <li><a href="#">statistic data</a></li>
                                <li><a href="#">business</a></li>
                                <li><a href="#">development</a></li>
                                <li><a href="#">startup ideas</a></li>
                                <li><a href="#">enterprise</a></li>
                            </ul>
                        </div>
                        <!-- end widget -->
                    </div>
                </div>
                <!-- END SIDEBAR CONTENT -->
            </div>
        </div>
    </div>--}}
    <!-- FOOTER -->
    {{--<footer class="footer-newsletter">
        <div class="container">
            <div class="footer-top">
                <h4 class="footer-heading">Subscribe to Our Newsletter</h4>
                <p class="copytext">Subscribe to the newsletter to get latest news and updates about our product.
                    <br>Preview the latest issue <a href="#">here</a></p>
                <form class="newsletter-form" method="post">
                    <div class="input-group input-group-lg">
                        <input type="email" class="form-control" name="email" placeholder="youremail@domain.com">
                        <span class="input-group-btn"><button class="btn btn-primary" type="button"><i class="fa fa-spinner fa-spin"></i><span>SUBSCRIBE</span></button>
							</span>
                    </div>
                    <div class="alert"></div>
                </form>
            </div>
            <div class="footer-bottom">
                <div class="left">
                    <nav class="clearfix">
                        <ul class="list-inline">
                            <li><a href="#">News</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Terms &amp; Privacy</a></li>
                            <li><a href="#">We're Hiring</a></li>
                        </ul>
                    </nav>
                    <p class="copyright-text">&copy;2017 <a href="https://www.themeineed.com/" target="_blank">The Develovers</a>. All Rights Reserved.</p>
                </div>
                <ul class="right list-inline social-icons social-icons-bordered social-icons-small social-icons-fullrounded">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>--}}
    <!-- END FOOTER -->
    <div class="back-to-top">
        <a href="#top"><i class="fa fa-chevron-up"></i></a>
    </div>
</div>
<!-- END WRAPPER -->
<!-- JAVASCRIPT -->
<script src="template/assets/js/jquery-2.1.1.min.js"></script>
<script src="template/assets/js/bootstrap.min.js"></script>
<script src="template/assets/js/plugins/easing/jquery.easing.min.js"></script>
<script src="template/assets/js/plugins/twitter/twitterFetcher.min.js"></script>
<script src="template/assets/js/bravana-lite.js"></script>
</body>

</html>
