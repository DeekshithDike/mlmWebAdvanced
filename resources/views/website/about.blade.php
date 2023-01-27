<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website-assets/images/favicon.png?v=20230127184122') }}" />
        
        <!-- PAGE TITLE HERE -->
        <title>{{ config('app.name', 'MLM') }}</title>
        
        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- [if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif] -->
        
        <!-- BOOTSTRAP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/bootstrap.min.css?v=20230127184122') }}">
        <!-- FONTAWESOME STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/fontawesome/css/font-awesome.min.css?v=20230127184122') }}" />
        <!-- FLATICON STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/flaticon.min.css?v=20230127184122') }}">
        <!-- ANIMATE STYLE SHEET --> 
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/animate.min.css?v=20230127184122') }}">
        <!-- OWL CAROUSEL STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/owl.carousel.min.css?v=20230127184122') }}">
        <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/bootstrap-select.min.css?v=20230127184122') }}">
        <!-- MAGNIFIC POPUP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/magnific-popup.min.css?v=20230127184122') }}">
        <!-- LOADER STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/loader.min.css?v=20230127184122') }}">    
        <!-- MAIN STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/style.css?v=20230127184122') }}">
        <!-- THEME COLOR CHANGE STYLE SHEET -->
        <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('website-assets/css/skin/skin-1.css?v=20230127184122') }}">
        <!-- CUSTOM  STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/custom.css?v=20230127184122') }}">
        <!-- SIDE SWITCHER STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/switcher.css?v=20230127184122') }}">

        
        <!-- REVOLUTION SLIDER CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/plugins/revolution/revolution/css/settings.css?v=20230127184122') }}">
        <!-- REVOLUTION NAVIGATION STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/plugins/revolution/revolution/css/navigation.css?v=20230127184122') }}">
        
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body id="bg"> 
        <div class="page-wraper"> 
            
            <!-- HEADER START -->
            <header class="site-header header-style-6">
            
                <div class="top-bar bg-primary">
                    <div class="container">
                        <div class="row">
                            <div class="clearfix">
                                <div class="wt-topbar-left">
                                    <ul class="list-unstyled e-p-bx pull-left">
                                        <li><i class="fa fa-envelope"></i><a href="mailto:support@kryptomusk.com">support@kryptomusk.com</a></li>
                                        <li><i class="fa fa-whatsapp"></i><a target="blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></li>
                                    </ul>
                                </div>
                                
                                <div class="wt-topbar-right">                                    
                                    <ul class="list-unstyled e-p-bx pull-right">
                                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i>Login</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-sign-in"></i>Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Search Link -->

                <!-- Search Form -->
                <div class="main-bar header-middle bg-white">
                    <div class="container">
                        <div class="logo-header">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('website-assets/images/logo-blue.png?v=20230127184122') }}" width="216" height="37" alt="" />
                            </a>
                        </div>
                        <div class="header-info">
                            <ul>
                                <li>
                                    <div>
                                        <div class="icon-sm">
                                            <span class="icon-cell  text-primary"><i class="iconmoon-travel"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <strong>Our Location </strong>
                                            <span>20-22 Wenlock Road, London</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <div class="icon-sm">
                                            <span class="icon-cell  text-primary"><i class="iconmoon-smartphone-1"></i></span>
                                        </div>
                                        <div class="icon-content">
                                            <strong>Phone Number</strong>
                                            <span><a target="blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></span>
                                        </div>
                                    </div>
                                </li>
                                <li class="btn-col-last">
                                    <a href="{{ route('register') }}" class="site-button text-uppercase radius-sm font-weight-700">Join Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!-- Search Form -->
                <div class="sticky-header main-bar-wraper">
                    <div class="main-bar header-botton nav-bg-secondry">
                        <div class="container">
                            <!-- NAV Toggle Button -->
                            <button data-target=".header-nav" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            
                            <!-- MAIN Vav -->
                            <div class="header-nav navbar-collapse collapse ">
                                <ul class=" nav navbar-nav">
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                
                                    <li class="active">
                                        <a href="{{ url('/about') }}">About Us</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/') }}#trading">Trading</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/') }}#packages">Packages</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/') }}#faq">Faq</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{ url('/') }}#contactUs">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>            
                
            </header>
            <!-- HEADER END -->
            
            <!-- CONTENT START -->
            <div class="page-content">
            
                <!-- INNER PAGE BANNER -->
                <div class="wt-bnr-inr overlay-wraper" style="background-image:url({{ asset('website-assets/images/banner/about-banner.jpg?v=20230127184122') }});">
                    <div class="overlay-main bg-black opacity-07"></div>
                    <div class="container">
                        <div class="wt-bnr-inr-entry">
                            <h1 class="text-white">About Krypto Musk</h1>
                        </div>
                    </div>
                </div>
                <!-- INNER PAGE BANNER END --> 
                    
                <!-- BREADCRUMB ROW -->                            
                <div class="bg-gray-light p-tb20">
                    <div class="container">
                        <ul class="wt-breadcrumb breadcrumb-style-2">
                            <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
                            <li>About Krypto Musk</li>
                        </ul>
                    </div>
                </div>
                <!-- BREADCRUMB  ROW END --> 
                
                <!-- ABOUT COMPANY SECTION START -->
                <div class="section-full p-tb100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="section-head text-left">
                                    <span class="wt-title-subline text-gray-dark font-16 m-b15">Who we are</span>
                                    <h2 class="text-uppercase">KRYPTO MUSK </h2>
                                    <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                    <p>
                                        Krypto Musk is one of the first hybrid trading platform founded by a group of visionaries whose idea was to offer a Hybrid platform available to ordinary people willing to participate in this global investment phenomenon and profit on daily bases  our vision is service over sales, honor over hustle and most importantly people over profits.
                                    </p>
                                    <p>
                                        The hybrid crypto program is a unique program where it combines the best of centralized and decentralized exchanges – offering high liquidity and fast transactions of centralized exchanges and anonymity and protection of decentralized exchanges.
                                    </p>
                                    <p>
                                        Hybrid cryptocurrency exchanges are an attempt to blend the best of both worlds from centralized and decentralized into one exchange. Their aim is to give end users the convenience of a centralized exchange while also giving them the security and freedom of a decentralized exchange.
                                    </p>
                                    <p>
                                        Here in kryptomusk company provides passive income for our clients by managing the trading account,creating profits on daily basis based on there investment,kryptomusk is an investment company mainly based on united kingdom, the principal activity of the company is provision of investment services to individuals in accordance with the provisions of the applicable legislation and requirment.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="wt-media">
                                    <img src="{{ asset('website-assets/images/banner/pic3.jpg?v=20230127184122') }}" alt="" class="img-responsive"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- ABOUT COMPANY SECTION END -->                    
                                        
            </div>
            <!-- CONTENT END -->
            
            <!-- FOOTER START -->
            <footer class="site-footer footer-dark bg-no-repeat bg-full-height bg-center "  style="background-image:url({{ asset('website-assets/images/background/footer-bg.jpg?v=20230127184122') }});">
                <!-- FOOTER BLOCKES START -->  
                <div class="footer-top overlay-wraper">
                    <div class="overlay-main bg-black opacity-05"></div>
                    <div class="container">
                        <div class="row">
                            <!-- ABOUT COMPANY -->
                            <div class="col-md-3 col-sm-6">  
                                <div class="widget widget_about">
                                    <h4 class="widget-title text-white">About Company</h4>
                                    <div class="logo-footer clearfix p-b15">
                                        <a href="{{ url('/') }}"><img src="{{ asset('website-assets/images/logo-white.png?v=20230127184122') }}" width="230" height="67" alt=""/></a>
                                    </div>
                                    <p>
                                        Krypto Musk is one of the first hybrid trading platform founded by a group of visionaries whose idea was to offer a Hybrid platform available to ordinary people willing to participate in this global investment phenomenon and profit on daily bases our vision is service over sales, honor over hustle and most importantly people over profits.
                                    </p>  
                                </div>
                            </div> 
                            <!-- RESENT POST -->
                            <div class="col-md-3 col-sm-6">
                                <div class="widget recent-posts-entry-date">
                                    <h4 class="widget-title text-white">Resent Post</h4>
                                    <div class="widget-post-bx">
                                        <div class="bdr-light-blue widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                            <div class="wt-post-date text-center text-uppercase text-white p-t5">
                                                <strong>25</strong>
                                                <span>Jan</span>
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="wt-post-header">
                                                    <h6 class="post-title"><a href="https://news.bitcoin.com/crypto-regulation-is-like-a-flimsy-umbrella-in-a-monsoon/">Crypto Regulation Is Like </a></h6>
                                                </div>
                                                <div class="wt-post-meta">
                                                    <ul>
                                                        <li class="post-author"><i class="fa fa-user"></i>By Bitcoin.com</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bdr-light-blue widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                            <div class="wt-post-date text-center text-uppercase text-white p-t5">
                                                <strong>25</strong>
                                                <span>Jan</span>
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="wt-post-header">
                                                    <h6 class="post-title"><a href="https://news.bitcoin.com/bitcoin-ethereum-technical-analysis-btc-eth-consolidate-ahead-of-us-gdp-consumer-sentiment-data/">Bitcoin, Ethereum Technical </a></h6>
                                                </div>
                                                <div class="wt-post-meta">
                                                    <ul>
                                                        <li class="post-author"><i class="fa fa-user"></i>By Bitcoin.com</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bdr-light-blue widget-post clearfix  bdr-b-1 m-b10 p-b10">
                                            <div class="wt-post-date text-center text-uppercase text-white p-t5">
                                                <strong>25</strong>
                                                <span>Jan</span>
                                            </div>
                                            <div class="wt-post-info">
                                                <div class="wt-post-header">
                                                    <h6 class="post-title"><a href="https://news.bitcoin.com/economist-peter-schiff-explains-why-bitcoin-and-gold-are-up-this-year-theyre-rising-for-opposite-reasons/">Economist Peter Schiff </a></h6>
                                                </div>
                                                <div class="wt-post-meta">
                                                    <ul>
                                                        <li class="post-author"><i class="fa fa-user"></i>By Bitcoin.com</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                            <!-- USEFUL LINKS -->
                            <div class="col-md-3 col-sm-6">
                                <div class="widget widget_services">
                                    <h4 class="widget-title text-white">Useful links</h4>
                                    <ul>                                    
                                        <li>
                                            <a href="{{ url('/about') }}">About Us</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ url('/') }}#trading">Trading</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ url('/') }}#packages">Packages</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ url('/') }}#faq">Faq</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ url('/') }}#contactUs">Contact Us</a>
                                        </li>
                                        
                                        <li>
                                            <a href="{{ url('/') }}#documents">Company Documents</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- NEWSLETTER -->
                            <div class="col-md-3 col-sm-6">
                                <div class="widget widget_newsletter">
                                    <h4 class="widget-title text-white">Newsletter</h4>
                                    <div class="newsletter-bx">
                                        <form role="search" action="/">
                                            <div class="input-group">
                                            <input name="news-letter" class="form-control" placeholder="ENTER YOUR EMAIL" type="text">
                                            <span class="input-group-btn">
                                                <button type="submit" class="site-button"><i class="fa fa-paper-plane-o"></i></button>
                                            </span>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- SOCIAL LINKS -->
                                <div class="widget widget_social_inks">
                                    <h4 class="widget-title text-white">Social Links</h4>
                                    <ul class="social-icons social-square social-darkest">
                                        <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-rss"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-youtube"></a></li>
                                        <li><a href="javascript:void(0);" class="fa fa-instagram"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12  p-tb20 ">
                                <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix ">
                                        <div class="icon-md text-primary">
                                            <span class="iconmoon-smartphone-1"></span>
                                        </div>
                                        <div class="icon-content text-white">
                                            <h5 class="wt-tilte text-uppercase m-b0">Phone</h5>
                                            <p class="m-b0"><a target="blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12  p-tb20">
                                <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                        <div class="icon-md text-primary">
                                            <span class="iconmoon-travel"></span>
                                        </div>
                                        <div class="icon-content text-white">
                                            <h5 class="wt-tilte text-uppercase m-b0">Address</h5>
                                            <p>20-22 Wenlock Road, London, England, N1 7GU</p>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 p-tb20">
                                <div class="wt-icon-box-wraper left  bdr-1 bdr-gray-dark p-tb15 p-lr10 clearfix">
                                    <div class="icon-md text-primary">
                                        <span class="iconmoon-email"></span>
                                    </div>
                                    <div class="icon-content text-white">
                                        <h5 class="wt-tilte text-uppercase m-b0">Email</h5>
                                        <p class="m-b0"><a href="mailto:support@kryptomusk.com">support@kryptomusk.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FOOTER COPYRIGHT -->
                <div class="footer-bottom  overlay-wraper">
                    <div class="overlay-main"></div>
                    <div class="constrot-strip"></div>
                    <div class="container p-t30">
                        <div class="row">
                            <div class="wt-footer-bot-left">
                                <span class="copyrights-text">© {{ date('Y') }} kryptomusk. All Rights Reserved. Designed By kryptomusk.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER END -->

            
            <!-- BUTTON TOP START -->
            <button class="scroltop"><span class=" iconmoon-house relative" id="btn-vibrate"></span>Top</button>            
                    
        </div>
    
        <!-- LOADING AREA START -->
        <div class="loading-area">
            <div class="loading-box"></div>
            <div class="loading-pic">
                <div class="cssload-container">
                    <div class="cssload-dot bg-primary">
                        <img src="{{ asset('website-assets/images/favicon-white.png?v=20230127184122') }}" width="230" height="67" alt="" />
                    </div>
                    <div class="step" id="cssload-s1"></div>
                    <div class="step" id="cssload-s2"></div>
                    <div class="step" id="cssload-s3"></div>
                </div>
            </div>
        </div>
        <!-- LOADING AREA  END -->

        <!-- JAVASCRIPT  FILES ========================================= --> 
        <script   src="{{ asset('website-assets/js/jquery-1.12.4.min.js?v=20230127184122') }}"></script><!-- JQUERY.MIN JS -->
        <script   src="{{ asset('website-assets/js/bootstrap.min.js?v=20230127184122') }}"></script><!-- BOOTSTRAP.MIN JS -->

        <script   src="{{ asset('website-assets/js/bootstrap-select.min.js?v=20230127184122') }}"></script><!-- FORM JS -->
        <script   src="{{ asset('website-assets/js/jquery.bootstrap-touchspin.min.js?v=20230127184122') }}"></script><!-- FORM JS -->

        <script   src="{{ asset('website-assets/js/magnific-popup.min.js?v=20230127184122') }}"></script><!-- MAGNIFIC-POPUP JS -->

        <script   src="{{ asset('website-assets/js/waypoints.min.js?v=20230127184122') }}"></script><!-- WAYPOINTS JS -->
        <script   src="{{ asset('website-assets/js/counterup.min.js?v=20230127184122') }}"></script><!-- COUNTERUP JS -->
        <script   src="{{ asset('website-assets/js/waypoints-sticky.min.js?v=20230127184122') }}"></script><!-- COUNTERUP JS -->

        <script  src="{{ asset('website-assets/js/isotope.pkgd.min.js?v=20230127184122') }}"></script><!-- MASONRY  -->

        <script   src="{{ asset('website-assets/js/owl.carousel.min.js?v=20230127184122') }}"></script><!-- OWL  SLIDER  -->

        <script   src="{{ asset('website-assets/js/stellar.min.js?v=20230127184122') }}"></script><!-- PARALLAX BG IMAGE   --> 
        <script   src="{{ asset('website-assets/js/scrolla.min.js?v=20230127184122') }}"></script><!-- ON SCROLL CONTENT ANIMTE   --> 

        <script   src="{{ asset('website-assets/js/custom.js?v=20230127184122') }}"></script><!-- CUSTOM FUCTIONS  -->
        <script   src="{{ asset('website-assets/js/shortcode.js?v=20230127184122') }}"></script><!-- SHORTCODE FUCTIONS  -->
        <script   src="{{ asset('website-assets/js/switcher.js?v=20230127184122') }}"></script><!-- SWITCHER FUCTIONS  -->
        <script  src="{{ asset('website-assets/js/jquery.bgscroll.js?v=20230127184122') }}"></script><!-- BACKGROUND SCROLL -->
        <script  src="{{ asset('website-assets/js/tickerNews.min.js?v=20230127184122') }}"></script><!-- TICKERNEWS-->
        
    </body>    
</html>
