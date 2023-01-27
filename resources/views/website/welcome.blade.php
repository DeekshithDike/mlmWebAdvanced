<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website-assets/images/favicon.png?v=20230127233845') }}" />
        
        <!-- PAGE TITLE HERE -->
        <title>{{ config('app.name', 'MLM') }}</title>
        
        <!-- MOBILE SPECIFIC -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- [if lt IE 9]>
            <script src="js/html5shiv.min.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif] -->
        
        <!-- BOOTSTRAP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/bootstrap.min.css?v=20230127233845') }}">
        <!-- FONTAWESOME STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/fontawesome/css/font-awesome.min.css?v=20230127233845') }}" />
        <!-- FLATICON STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/flaticon.min.css?v=20230127233845') }}">
        <!-- ANIMATE STYLE SHEET --> 
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/animate.min.css?v=20230127233845') }}">
        <!-- OWL CAROUSEL STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/owl.carousel.min.css?v=20230127233845') }}">
        <!-- BOOTSTRAP SELECT BOX STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/bootstrap-select.min.css?v=20230127233845') }}">
        <!-- MAGNIFIC POPUP STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/magnific-popup.min.css?v=20230127233845') }}">
        <!-- LOADER STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/loader.min.css?v=20230127233845') }}">    
        <!-- MAIN STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/style.css?v=20230127233845') }}">
        <!-- THEME COLOR CHANGE STYLE SHEET -->
        <link rel="stylesheet" class="skin" type="text/css" href="{{ asset('website-assets/css/skin/skin-1.css?v=20230127233845') }}">
        <!-- CUSTOM  STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/custom.css?v=20230127233845') }}">
        <!-- SIDE SWITCHER STYLE SHEET -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/css/switcher.css?v=20230127233845') }}">

        
        <!-- REVOLUTION SLIDER CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/plugins/revolution/revolution/css/settings.css?v=20230127233845') }}">
        <!-- REVOLUTION NAVIGATION STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('website-assets/plugins/revolution/revolution/css/navigation.css?v=20230127233845') }}">
        
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">  
        <link href="https://fonts.googleapis.com/css?family=Crete+Round:400,400i&amp;subset=latin-ext" rel="stylesheet">
    </head>
    
    <body id="bg"> 
        <div class="page-wraper"> 
            
            <!-- HEADER START -->
            <header class="site-header header-style-3 topbar-transparent">
            
                <div class="top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="clearfix">
                                <div class="wt-topbar-left">
                                    <ul class="list-unstyled e-p-bx pull-left">
                                        <li><i class="fa fa-envelope"></i><a href="mailto:support@kryptomusk.com">support@kryptomusk.com</a></li>
                                        <li><i class="fa fa-whatsapp"></i><a target="_blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></li>
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
                
                <div class="sticky-header main-bar-wraper">
                    <div class="main-bar">
                        <div class="container">                            
                            <div class="logo-header mostion">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('website-assets/images/logo-white.png?v=20230127233845') }}" width="230" height="67" alt="" />
                                </a>
                            </div>
                            
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
                                
                                    <li>
                                        <a href="#aboutUs">About Us</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#trading">Trading</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#packages">Packages</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#faq">Faq</a>
                                    </li>
                                    
                                    <li>
                                        <a href="#contactUs">Contact Us</a>
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
            
                <!-- SLIDER START -->
                <div class="main-slider style-two default-banner">
                    <div class="tp-banner-container">
                        <div class="tp-banner" >
                            <!-- START REVOLUTION SLIDER 5.4.1 -->
                            <div id="rev_slider_1014_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="typewriter-effect" data-source="gallery">
                            <div id="rev_slider_1014_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                                    <ul>
                                        <!-- SLIDE 1 -->	
                                        <li data-index="rs-1000" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  alt=""  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina/>
                                        <!-- LAYERS -->
                                        
                                        <!-- LAYER NR. 1 [ for overlay ] -->
                                        <div class="tp-caption tp-shape tp-shapewrapper " 
                                        id="slide-100-layer-1" 
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                        data-width="full"
                                        data-height="full"
                                        data-whitespace="nowrap"
                                        data-type="shape" 
                                        data-basealign="slide" 
                                        data-responsive_offset="off" 
                                        data-responsive="off"
                                        data-frames='[
                                        {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index: 12;background-color:rgba(0, 0, 0, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                        </div>
                                        <!-- LAYER NR. 2 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-100-layer-2" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','30']" 
                                        data-y="['top','top','top','top']" data-voffset="['308','308','308','308']"  
                                        data-fontsize="['60','60','60','60']"
                                        data-lineheight="['110','110','110','110']"
                                        data-width="['6','6','6','6']"
                                        data-height="['110,'110','110','110']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal;                                                                    
                                        ">
                                        
                                        <div class="bg-primary">&nbsp;</div>
                                        
                                        </div>
                                                                        
                                        <!-- LAYER NR. 3 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-100-layer-3" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['300','300','300','300']"  
                                        data-fontsize="['55','55','55','45']"
                                        data-lineheight="['60','60','60','65']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        color: rgb(75, 57, 65);
                                        border-width:0px;">
                                        
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase;">
                                            <span class="text-white" style="padding-right:10px;">We</span><span class="text-primary">Trade</span>
                                        </div>
                                        
                                        </div>
                                        
                                        <!-- LAYER NR. 4 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-100-layer-4" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['360','360','360','360']"  
                                        data-fontsize="['53','53','53','45']"
                                        data-lineheight="['70','70','70','75']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        border-width:0px;">
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                                            <span class="text-primary" style="padding-right:10px;">For</span><span class="text-white">You</span>
                                        </div>
                                        
                                        </div>
                                    
                                        <!-- LAYER NR. 5 [ for paragraph] -->
                                        <div class="tp-caption  tp-resizeme" 
                                        id="slide-100-layer-5" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['440','440','440','440']"  
                                        data-fontsize="['16','16','16','30']"
                                        data-lineheight="['30','30','30','40']"
                                        data-width="['600','600','600','600']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        font-weight: 500; 
                                        color:#fff;
                                        border-width:0px;">
                                        <span style="font-family: 'Poppins', sans-serif;">We provides always our best services for SECURED BYs and  always  try to achieve SECURED BY's trust and satisfaction.</span>
                                        </div>
                                    
                                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-100-layer-6"						
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 

                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13; text-transform:uppercase;">
                                        <a href="#contactUs" class="site-button slider-btn-left">Contact Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 7 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-100-layer-7"						
                                        data-x="['left','left','left','left']" data-hoffset="['220','220','220','320']" 
                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13;
                                        text-transform:uppercase;
                                        font-weight:500;
                                        ">
                                        <a href="{{ route('register') }}" class=" site-button white slider-btn-right">Join Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 8 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-100-layer-8"						
                                        data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['100','100','100','100']"
                                        
                                        data-frames='[ 
                                        {"from":"y:200px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/earth.png?v=20230127233845') }}" alt="" class="spin-city">
                                        </div>
                                        
                                        <!-- LAYER NR. 9 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-100-layer-9"
                                        
                                        data-x="['right','right','right','right']" data-hoffset="['120','120','120','120']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['180','180','180','180']"
                                        
                                        data-height="none"
                                        data-whitespace="nowrap"
                            
                                        data-type="image" 
                                        data-responsive_offset="on" 
                            
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                                                    
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/bitcoin.png?v=20230127233845') }}" alt="">
                                        </div>  

                                        
                                    </li>
                                        
                                        <!-- SLIDE 2 -->
                                        <li data-index="rs-1001" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  alt=""  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina/>
                                        <!-- LAYERS -->
                                        
                                        <!-- LAYER NR. 1 [ for overlay ] -->
                                        <div class="tp-caption tp-shape tp-shapewrapper " 
                                        id="slide-101-layer-1" 
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                        data-width="full"
                                        data-height="full"
                                        data-whitespace="nowrap"
                                        data-type="shape" 
                                        data-basealign="slide" 
                                        data-responsive_offset="off" 
                                        data-responsive="off"
                                        data-frames='[
                                        {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index: 12;background-color:rgba(0, 0, 0, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                        </div>
                                        
                                        <!-- LAYER NR. 2 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-101-layer-2" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','30']" 
                                        data-y="['top','top','top','top']" data-voffset="['308','308','308','308']"  
                                        data-fontsize="['60','60','60','60']"
                                        data-lineheight="['110','110','110','110']"
                                        data-width="['6','6','6','6']"
                                        data-height="['110,'110','110','110']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal;                                                                    
                                        ">
                                        
                                        <div class="bg-primary">&nbsp;</div>
                                        
                                        </div>
                                                                        
                                        <!-- LAYER NR. 3 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-101-layer-3" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['300','300','300','300']"  
                                        data-fontsize="['55','55','55','45']"
                                        data-lineheight="['60','60','60','65']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        color: rgb(75, 57, 65);
                                        border-width:0px;">
                                        
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase; ">
                                            <span class="text-white" style="padding-right:10px;">Bitcoin</span><span class="text-primary">Invest</span>
                                        </div>
                                        
                                        </div>
                                        
                                        <!-- LAYER NR. 4 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-101-layer-4" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['360','360','360','360']"  
                                        data-fontsize="['53','53','53','45']"
                                        data-lineheight="['70','70','70','70']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        border-width:0px;">
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                                            <span class="text-primary" style="padding-right:10px;">Easy & </span><span class="text-white">Secure way</span>
                                        </div>
                                        
                                        </div>
                                    
                                        <!-- LAYER NR. 5 [ for paragraph] -->
                                        <div class="tp-caption  tp-resizeme" 
                                        id="slide-101-layer-5" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['440','440','440','440']"  
                                        data-fontsize="['16','16','16','30']"
                                        data-lineheight="['30','30','30','40']"
                                        data-width="['600','600','600','600']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        font-weight: 500; 
                                        color:#fff;
                                        border-width:0px;">
                                        <span style="font-family: 'Poppins', sans-serif;">We help you business grow and expand.</span>
                                        </div>
                                    
                                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-6"						
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13; text-transform:uppercase;">
                                        <a href="#contactUs" class="site-button slider-btn-left">Contact Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 7 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-7"						
                                        data-x="['left','left','left','left']" data-hoffset="['220','220','220','320']" 
                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13;
                                        text-transform:uppercase;
                                        font-weight:500;
                                        ">
                                        <a href="{{ route('register') }}" class=" site-button white slider-btn-right">Join Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 8 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-8"						
                                        data-x="['right','right','right','right']" data-hoffset="['-100','-100','-100','-100']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-650','-650','-650','-650']"
                                        
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/earth2.png?v=20230127233845') }}" alt="" class="spin-city">
                                        </div>
                                        
                                        <!-- LAYER NR. 9 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-9"						
                                        data-x="['right','right','right','right']" data-hoffset="['-300','-100','-100','-100']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-200','-200','-200','-200']"
                                        
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/earth2-shadow.png?v=20230127233845') }}" alt="">
                                        </div>  
                                                                        
                                        <!-- LAYER NR. 10 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-10"
                                        
                                        data-x="['right','right','right','right']" data-hoffset="['200','200','200','200']" 
                                        data-y="['top','bottom','bottom','bottom']" data-voffset="['150','150','150','150']"
                                        
                                        data-height="none"
                                        data-whitespace="nowrap"
                            
                                        data-type="image" 
                                        data-responsive_offset="on" 
                            
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                                                    
                                        style="z-index: 16;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/rocket.png?v=20230127233845') }}" alt="" class="floating">
                                        </div> 
                                                                            
                                        <!-- LAYER NR. 11 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-11"
                                        
                                        data-x="['right','right','right','right']" data-hoffset="['278','278','278','278']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['180','100','100','100']"
                                        
                                        data-height="none"
                                        data-whitespace="nowrap"
                            
                                        data-type="image" 
                                        data-responsive_offset="on" 
                            
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":4000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                                                    
                                        style="z-index: 15;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/fire.gif?v=20230127233845') }}" alt="" class="floating">
                                        </div>
                                        
                                        <!-- LAYER NR. 12 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-101-layer-12"
                                        
                                        data-x="['right','right','right','right']" data-hoffset="['100','100','100','100']" 
                                        data-y="['top','bottom','bottom','bottom']" data-voffset="['0','0','0','0']"
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['500','500','500','500']"
                                        data-height="['none','none','none','none']"                                    
                                        data-whitespace="nowrap"
                                        data-type="image" 
                                        data-responsive_offset="on" 
                            
                                        data-frames='[ 
                                        {"from":"y:0px(R);opacity:0;","speed":2000,"to":"o:1;","delay":4000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                                                    
                                        style="z-index: 12;">
                                        <div class="coin-slide bg-full-width bg-repeat-y coin-slide-rotate" style="background-image:url({{ asset('website-assets/images/main-slider/slider2/coin-sky.png?v=20230127233845') }});height:100vh;"></div>
                                        </div>    
                                                                                                    
                                    </li>

                                        <!-- SLIDE  3 -->
                                        <li data-index="rs-1002" data-transition="slidingoverlayhorizontal" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/slide1.jpg?v=20230127233845') }}"  alt=""  data-bgposition="center bottom" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina/>
                                        <!-- LAYERS -->
                                        
                                        <!-- LAYER NR. 1 [ for overlay ] -->
                                        <div class="tp-caption tp-shape tp-shapewrapper " 
                                        id="slide-102-layer-1" 
                                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                        data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                                        data-width="full"
                                        data-height="full"
                                        data-whitespace="nowrap"
                                        data-type="shape" 
                                        data-basealign="slide" 
                                        data-responsive_offset="off" 
                                        data-responsive="off"
                                        data-frames='[
                                        {"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index: 12;background-color:rgba(0, 0, 0, 0.3);border-color:rgba(0, 0, 0, 0);border-width:0px;"> 
                                        </div>
                                        
                                        <!-- LAYER NR. 2 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-102-layer-2" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','30']" 
                                        data-y="['top','top','top','top']" data-voffset="['308','308','308','308']"  
                                        data-fontsize="['60','60','60','60']"
                                        data-lineheight="['110','110','110','110']"
                                        data-width="['6','6','6','6']"
                                        data-height="['110,'110','110','110']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal;                                                                    
                                        ">
                                        
                                        <div class="bg-primary">&nbsp;</div>
                                        
                                        </div>
                                                                        
                                        <!-- LAYER NR. 3 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-102-layer-3" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['300','300','300','300']"  
                                        data-fontsize="['55','55','55','45']"
                                        data-lineheight="['60','60','60','65']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        color: rgb(75, 57, 65);
                                        border-width:0px;">
                                        
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase; ">
                                            <span class="text-primary" style="padding-right:10px;">Bitcoin</span><span class="text-white">Currency</span>
                                        </div>
                                        
                                        </div>
                                        
                                        <!-- LAYER NR. 4 [ for title ] -->
                                        <div class="tp-caption   tp-resizeme" 
                                        id="slide-102-layer-4" 
                                        data-x="['left','left','left','left']" data-hoffset="['60','60','60','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['360','360','360','360']"  
                                        data-fontsize="['53','53','53','45']"
                                        data-lineheight="['70','70','70','70']"
                                        data-width="['700','700','700','700']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on" 
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        white-space: normal; 
                                        font-weight: 700;
                                        border-width:0px;">
                                        <div style="font-family: 'Poppins', sans-serif; text-transform:uppercase ;">
                                            <span class="text-white" style="padding-right:10px;">Easy Way</span><span class="text-primary">to Trade</span>
                                        </div>
                                        
                                        </div>
                                    
                                        <!-- LAYER NR. 5 [ for paragraph] -->
                                        <div class="tp-caption  tp-resizeme" 
                                        id="slide-102-layer-5" 
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['440','440','440','440']"  
                                        data-fontsize="['16','16','16','30']"
                                        data-lineheight="['30','30','30','40']"
                                        data-width="['600','600','600','600']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                    
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                    
                                        style="z-index: 13; 
                                        font-weight: 500; 
                                        color:#fff;
                                        border-width:0px;">
                                        <span style="font-family: 'Poppins', sans-serif;">A clever way to make crypto investment always be effective.</span>
                                        </div>
                                    
                                        <!-- LAYER NR. 6 [ for see all service botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-102-layer-6"						
                                        data-x="['left','left','left','left']" data-hoffset="['30','30','30','100']" 
                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13; text-transform:uppercase;">
                                        <a href="#contactUs" class="site-button slider-btn-left">Contact Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 7 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-102-layer-7"						
                                        data-x="['left','left','left','left']" data-hoffset="['220','220','220','320']" 
                                        data-y="['top','top','top','top']" data-voffset="['530','530','530','600']"  
                                        data-lineheight="['none','none','none','none']"
                                        data-width="['300','300','300','300']"
                                        data-height="['none','none','none','none']"
                                        data-whitespace="['normal','normal','normal','normal']"
                                        
                                        data-type="text" 
                                        data-responsive_offset="on"
                                        data-frames='[ 
                                        {"from":"y:100px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                        style="z-index:13;
                                        text-transform:uppercase;
                                        font-weight:500;
                                        ">
                                        <a href="{{ route('register') }}" class=" site-button white slider-btn-right">Join Us</a>
                                        </div>
                                        
                                        <!-- LAYER NR. 8 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-102-layer-8"						
                                        data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['-20','-20','-20','-20']"
                                        
                                        data-frames='[ 
                                        {"from":"y:200px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/rock.png?v=20230127233845') }}" alt="">
                                        </div>
                                        
                                        <!-- LAYER NR. 9 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-102-layer-9"						
                                        data-x="['right','right','right','right']" data-hoffset="['320','320','320','320']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['130','130','130','130']"
                                        
                                        data-frames='[ 
                                        {"from":"y:-500px(R);opacity:0;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeOut"},
                                        {"delay":"wait","speed":1000,"to":"y:-50px;opacity:0;","ease":"Power2.easeInOut"}
                                        ]'
                                        
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/agent.png?v=20230127233845') }}" alt="">
                                        </div>  
                                                                        
                                        <!-- LAYER NR. 10 [ for more detail botton ] -->
                                        <div class="tp-caption tp-resizeme" 	
                                        id="slide-102-layer-10"
                                        
                                        data-x="['right','right','right','right']" data-hoffset="['20','20','20','20']" 
                                        data-y="['bottom','bottom','bottom','bottom']" data-voffset="['80','80','80','80']"
                                        
                                        data-height="none"
                                        data-whitespace="nowrap"
                            
                                        data-type="image" 
                                        data-responsive_offset="on" 
                            
                                        data-frames='[{"from":"x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;","speed":1500,"to":"o:1;","delay":3000,"ease":"Power3.easeOut"},
                                        {"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                        data-textAlign="['left','left','left','left']"
                                        data-paddingtop="[0,0,0,0]"
                                        data-paddingright="[0,0,0,0]"
                                        data-paddingbottom="[0,0,0,0]"
                                        data-paddingleft="[0,0,0,0]"
                                        
                                                                    
                                        style="z-index: 13;">
                                        <img src="{{ asset('website-assets/images/main-slider/slider2/plant.png?v=20230127233845') }}" alt="">
                                        </div> 
                                    </li>
                                                                    
                                    </ul>
                                        
                            </div>
                            </div>
                            <!-- END REVOLUTION SLIDER -->
                        </div>
                    </div>
                </div>
                <!-- SLIDER END -->
                        
                <!-- ABOUT COMPANY SECTION START -->           
                <div id="aboutUs" class="section-full home-about-section p-t80 bg-no-repeat bg-bottom-right"  style="background-image:url({{ asset('website-assets/images/background/bg-coin.png?v=20230127233845') }})">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wt-box text-right">
                                    <img src="{{ asset('website-assets/images/background/bg-laptop.png?v=20230127233845') }}" alt=""> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wt-right-part p-b80">
                                        <!-- TITLE START -->
                                        <div class="section-head text-left">
                                            <span class="wt-title-subline font-16 text-gray-dark m-b15">Who we are</span>
                                            <h2 class="text-uppercase">ABOUT KRYPTO MUSK</h2>
                                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                                        </div>
                                        <!-- TITLE END -->
                                        <div class="section-content">
                                            <div class="wt-box">
                                                <p>
                                                    Krypto Musk is one of the first hybrid trading platform founded by a group of visionaries whose idea was to offer a Hybrid platform available to ordinary people willing to participate in this global investment phenomenon and profit on daily bases  our vision is service over sales, honor over hustle and most importantly people over profits.
                                                </p>
                                                <p>
                                                    The hybrid crypto program is a unique program where it combines the best of centralized and decentralized exchanges – offering high liquidity and fast transactions of centralized exchanges and anonymity and protection of decentralized exchanges.
                                                </p>
                                                <a href="{{ url('/about') }}" class="site-button text-uppercase m-r15">Read More</a>
                                            </div>
                                        </div>                                	
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ABOUT COMPANY SECTION  END --> 
                
                <!-- WHY CHOOSE US SECTION START  -->
                <div class="section-full  p-t80 p-b80 bg-gray">
                    <div class="container">
                        <!-- TITLE START-->
                        <div class="section-head text-center">
                            <span class="wt-title-subline font-16 text-gray-dark m-b15">Invest and Earn Cryptocurrencies</span>
                            <h2 class="text-uppercase">Why Choose Krypto Musk</h2>
                            <div class="wt-separator-outer">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p> --}}
                        </div>
                        <!-- TITLE END-->
                        <div class="section-content no-col-gap">
                            <div class="row">
                            
                                <!-- COLUMNS 1 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-29.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Instant Trading</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 2 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-28.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content ">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Recurring Buying</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-17.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Safe and Secure</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 4 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-19.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Investment Planning</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 5 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-12.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Wallet Transaction</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 6 -->
                                <div class="col-md-4 col-sm-6 animate_line">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-38.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Easy Withdrawal</h4>
                                            {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesg indtrysum has been the Ipsum dummy of the printing indus .</p> --}}
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- WHY CHOOSE US SECTION END -->                      

                <!-- COMPANY DETAIL SECTION START -->
                <div class="section-full p-t50 p-b50 overlay-wraper bg-parallax clouds1 bg-repeat"  data-stellar-background-ratio="0.5" style="background-image:url({{ asset('website-assets/images/background/bg-9.jpg?v=20230127233845') }});">
                    <div class="overlay-main bg-secondry opacity-05"></div>
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <div class="rocket-pic">
                                    <div class="rocket-animation ">
                                        <img src="{{ asset('website-assets/images/rocket.png?v=20230127233845') }}" alt="" class="floating" />
                                        <div class="rocket-fire"> <img src="{{ asset('website-assets/images/fire.gif?v=20230127233845') }}" alt="" class="floating"/></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6">
                                <div class="awesome-counter text-right text-white">
                                    <h3 class="font-24">The Krypto Musk</h3>
                                    <h2 class="font-60 font-weight-600"><span class="text-primary"> AWESOME FACTS</span></h2>
                                    <p>
                                        The hybrid exchange offers the best of both worlds and is part of a new generation of crypto trading platforms. Compared to older exchanges, these new exchanges offer greater functionality, liquidity, and security than centralized exchanges.
                                    </p>
                                    <p>
                                        In the crypto space, hybrid exchanges are relatively new, boasting fast transaction speeds without compromising their users' privacy. It will take time to see if they are successful or not due to high costs, limited scalability, and limited assets.
                                    </p>
                                    <p>
                                        Hybrid decentralized exchanges are the Combination of both ethereum decentralized exchange and TRON Decentralized exchange in just one single platform.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- COMPANY DETAIL SECTION End -->   
                        
                <!-- HOW IT WORK SECTION START  -->
                <div class="section-full  p-t80 p-b80 bg-gray">
                    <div class="container">
                        <!-- TITLE START-->
                        <div class="section-head text-center">
                            <span class="wt-title-subline font-16 text-gray-dark m-b15">Get started in three steps</span>
                            <h2 class="text-uppercase">How It Work</h2>
                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga eos optio ducimus odit, labore hic fugiat iusto veniam necessitatibus quas doloremque sapiente maiores.</p> --}}
                        </div>
                        <!-- TITLE END-->
                        <div class="section-content no-col-gap">
                            <div class="row">
                            
                                <!-- COLUMNS 1 -->
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-4.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <div class="step-number">1</div>
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Create your account</h4>
                                            <p>Simply click on Register button and input your personal details.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 2 -->
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-primary m-a5 ">
                                        <div class="icon-lg m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-28.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content text-white">
                                            <div class="step-number active">2</div>
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Fund your account</h4>
                                            <p>Once you are registered you will find company deposit details to proceed with an investment.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- COLUMNS 3 -->
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 center bg-white m-a5">
                                        <div class="icon-lg text-primary m-b20">
                                            <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/icon/pick-12.png?v=20230127233845') }}" alt=""></a>
                                        </div>
                                        <div class="icon-content">
                                            <div class="step-number">3</div>
                                            <h4 class="wt-tilte text-uppercase font-weight-500">Get daily profit</h4>
                                            <p>As soon as we receive your investment we will activate your account and start making profit.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- HOW IT WORK  SECTION END -->
                        
                <!-- SECTION CONTENT START -->
                <div id="trading" class="section-full  p-tb80 bg-full-height bg-repeat-x graph-slide-image" style="background-image:url({{ asset('website-assets/images/background/bg-1.jpg?v=20230127233845') }});">
                    
                    <div class="container">
                            
                            <div class="row">
                                <div class="col-md-6  clearfix">
                                    <div class="wt-box graph-tabing">
                                        <div class="wt-accordion acc-bg-primary acc-has-bg" id="accordion6">
                                                <div class="panel wt-panel">
                                                
                                                    <div class="acod-head acc-actives">
                                                        <h6 class="acod-title text-uppercase">
                                                            <a data-toggle="collapse" href="#collapseOne6" data-parent="#accordion6" >
                                                                Who?
                                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    
                                                    <div id="collapseOne6" class="acod-body collapse in">
                                                        <div class="acod-content p-tb15">
                                                            Krypto Musk is one of the first hybrid trading platform founded by a group of visionaries whose idea was to offer a Hybrid platform available to ordinary people willing to participate in this global investment phenomenon and profit on daily bases  our vision is service over sales, honor over hustle and most importantly people over profits.
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="panel wt-panel">
                                                    <div class="acod-head">
                                                        <h6 class="acod-title text-uppercase">
                                                            <a data-toggle="collapse" href="#collapseTwo6" class="collapsed" data-parent="#accordion6" >
                                                            Why? 
                                                            <span class="indicator"><i class="fa fa-plus"></i></span>
                                                            </a>
                                                        </h6>
                                                    </div>
                                                    <div id="collapseTwo6" class="acod-body collapse">
                                                        <div class="acod-content p-tb15">
                                                            What are the main types of crypto exchanges?<br />
                                                            Like stock exchanges, crypto traders can buy, sell, and convert cryptocurrencies on crypto exchanges. There are currently three types of cryptocurrency exchanges—centralised exchanges (CEXs), decentralised exchanges (DEX) and hybrid exchanges (HEX).
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel wt-panel">
                                                    <div class="acod-head">
                                                    <h6 class="acod-title text-uppercase">
                                                        <a data-toggle="collapse"  href="#collapseThree6" class="collapsed"  data-parent="#accordion6">
                                                    How? 
                                                        <span class="indicator"><i class="fa fa-plus"></i></span>
                                                        </a>
                                                    </h6>
                                                    </div>
                                                    <div id="collapseThree6" class="acod-body collapse">
                                                        <div class="acod-content p-tb15">
                                                            Simple sign up youself using the give link, very your details and register, one's you register you can activate your account using minimum investment.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>                            	                               
                                </div>
                                <div class="col-md-6">
                                    <div class="wt-box graph-part-right text-white">
                                        <strong class="text-uppercase title-first">Krypto Musk</strong>
                                        <span class="text-uppercase text-primary display-block title-second">DON’T WASTE YOUR VALUABLE TIME, START NOW!</span>
                                        <p><strong>Step into financial freedom and become a member of the fastest rising company on the market.</strong></p>
                                        <ul class="list-check-circle primary">
                                            <li>More than 12,000 clients</li>
                                            <li>24/7 customer support</li>
                                            <li>Annual seminars</li>
                                            <li>Weekly webinars</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <!-- SECTION CONTENT  END -->

                <!-- Packages SECTION START  -->
                <div id="packages" class="section-full  p-t80 p-b80 bg-gray">
                    <div class="container">
                        <!-- TITLE START-->
                        <div class="section-head text-center">
                            <span class="wt-title-subline font-16 text-gray-dark m-b15">Our Joining Package</span>
                            <h2 class="text-uppercase">Packages</h2>
                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga eos optio ducimus odit, labore hic fugiat iusto veniam necessitatibus quas doloremque sapiente maiores.</p> --}}
                        </div>
                        <!-- TITLE END-->
                        <div class="section-content no-col-gap">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 bg-secondry m-a5">
                                        <div class="icon-content text-white">
                                            <h2 class="wt-tilte text-uppercase font-weight-500">Basic Plan</h2>
                                            <ul class="list-check-circle primary">
                                                <li>25$ - 9999$</li>
                                                <li>1.5℅ ROI</li>
                                                <li>8℅ Referrals</li>
                                                <li>10℅ Binary</li>
                                                <li>Duration 180 days</li>
                                                <li>Capping 1000$</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 bg-primary m-a5">
                                        <div class="icon-content text-white">
                                            <h2 class="wt-tilte text-uppercase font-weight-500">Premium Plan</h2>
                                            <ul class="list-check-circle white">
                                                <li>10000$ - 49999$</li>
                                                <li>2℅ ROI</li>
                                                <li>9℅ Referrals</li>
                                                <li>10℅ Binary</li>
                                                <li>Duration 150 days</li>
                                                <li>Capping 5000$</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4 step-number-block">
                                    <div class="wt-icon-box-wraper  p-a30 bg-secondry m-a5">
                                        <div class="icon-content text-white">
                                            <h2 class="wt-tilte text-uppercase font-weight-500">Executive plan</h2>
                                            <ul class="list-check-circle primary">
                                                <li>50000$ - 149999$</li>
                                                <li>2.5℅ ROI</li>
                                                <li>10℅ Referrals</li>
                                                <li>10℅ Binary</li>
                                                <li>Duration 120 days</li>
                                                <li>Capping 15000$</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- Packages  SECTION END -->
                
                <!-- SECTION CONTENT START -->
                <div class="section-full no-col-gap bg-repeat" id="contactUs">
                    <div class="container-fluid">
                            
                            <div class="row">
                                <div class="col-md-6 col-sm-6 bg-secondry">
                                    <div class="section-content p-b100 p-t150 p-r30 clearfix">
                                        <div class="wt-left-part any-query">
                                            <img src="{{ asset('website-assets/images/any-query.png?v=20230127233845') }}" alt="">
                                            <br />
                                            <br />
                                            <div class="text-center">
                                                <h3 class="text-uppercase font-weight-500 text-white">Call Us</h3>
                                                <p class="text-white">Call us to clarify if you've any query.</p>
                                                <h4><i class="fa fa-whatsapp text-primary"></i>&nbsp;<a class="text-primary" target="_blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></h4>
                                            </div>    
                                        </div>
                                    </div>                               
                                </div>
                                <div class="col-md-6 col-sm-6 bg-primary">
                                    <div class="section-content p-b100 p-t150 p-l30 clearfix">
                                        <div class="wt-right-part any-query">
                                            <img src="{{ asset('website-assets/images/any-query-contact.png?v=20230127233845') }}" alt="">
                                            <br />
                                            <br />
                                            <div class="text-center">
                                                <h3 class="text-uppercase font-weight-500 text-white">Email Us</h3>
                                                <p class="text-white">Send us email for any clarifcation required on our service.</p>
                                                <h4><i class="fa fa-envelope text-white"></i>&nbsp;<a class="text-white" href="mailto:support@kryptomusk.com">support@kryptomusk.com</a></h4>
                                            </div>                               
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>
                <!-- SECTION CONTENT  END --> 
                
                <!-- LATEST BLOG SECTION START -->
                <div class="section-full latest-blog bg-gray p-t80 p-b50">
                    <div class="container">
                        <!-- TITLE -->
                        <div class="section-head text-center">
                            <h2 class="text-uppercase">Latest News</h2>
                            <div class="wt-separator-outer">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                            <p>Stay updated, stay informed with our latest and upcoming news concerning the crypto world.</p>
                        </div>
                        <!-- TITLE -->
                        
                        <div class="section-content ">
                            <div class="row equal-wraper">
                                <!-- COLUMNS 1 -->
                                <div class="col-md-6 col-sm-12">
                                    <div class="blog-post latest-blog-3 overlay-wraper post-overlay date-style-2 bg-cover bg-no-repeat bg-top-center"  style="background-image:url(https://static.news.bitcoin.com/wp-content/uploads/2023/01/ddd5678-1024x576.jpg);">
                                        <div class="overlay-main opacity-03 bg-secondry"></div>
                                        <div class="wt-post-info p-a30 p-b20 text-white">
                                            <div class="post-overlay-position">
                                                <div class="wt-post-title ">
                                                    <h3 class="post-title"><a href="https://news.bitcoin.com/crypto-regulation-is-like-a-flimsy-umbrella-in-a-monsoon/" class="text-white text-capitalize">Crypto Regulation Is Like a Flimsy Umbrella in a Monsoon</a></h3>
                                                </div>
                                                <div class="wt-post-meta ">
                                                    <ul>
                                                        <li class="post-date"><i class="fa fa-calendar"></i><strong>25 Jan</strong> <span> 2023</span></li>
                                                        <li class="post-author"><i class="fa fa-user"></i>By <a href="https://news.bitcoin.com/crypto-regulation-is-like-a-flimsy-umbrella-in-a-monsoon/">Bitcoin.com</a> </li>
                                                    </ul>
                                                </div>
                                                <div class="wt-post-text">
                                                    <p>You know what they say, “when life gives you lemons, make lemonade.” But when it comes to protecting...</p> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-12">
                                
                                    <div class="blog-post latest-blog-3 blog-md date-style-2 clearfix">
                                        <div class="wt-post-media wt-img-effect zoom-slow">
                                            <a href="https://news.bitcoin.com/bitcoin-ethereum-technical-analysis-btc-eth-consolidate-ahead-of-us-gdp-consumer-sentiment-data/"><img src="https://static.news.bitcoin.com/wp-content/uploads/2023/01/shutterstock_1953266017-760x428.jpg" alt=""></a>
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-title ">
                                                <h4 class="post-title font-weight-800"><a href="https://news.bitcoin.com/bitcoin-ethereum-technical-analysis-btc-eth-consolidate-ahead-of-us-gdp-consumer-sentiment-data/">Bitcoin, Ethereum Technical Analysis: BTC, ETH Consolidate Ahead of US GDP, Consumer Sentiment Data</a></h4>
                                            </div>
                                            <div class="wt-post-meta ">
                                                <ul>
                                                    <li class="post-date"><i class="fa fa-calendar"></i><strong>25 Jan</strong> <span> 2023</span></li>
                                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="https://news.bitcoin.com/bitcoin-ethereum-technical-analysis-btc-eth-consolidate-ahead-of-us-gdp-consumer-sentiment-data/">Bitcoin.com</a> </li>
                                                </ul>
                                            </div>
                                            <div class="wt-post-text">
                                                <p>Cryptocurrencies continued to consolidate recent gains on Jan. 24, as markets prepared...</p> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="blog-post latest-blog-3 blog-md date-style-2 clearfix">
                                        <div class="wt-post-media wt-img-effect zoom-slow">
                                            <a href="https://news.bitcoin.com/economist-peter-schiff-explains-why-bitcoin-and-gold-are-up-this-year-theyre-rising-for-opposite-reasons/"><img src="https://static.news.bitcoin.com/wp-content/uploads/2023/01/peter-schiff-gold-bitcoin.jpg" alt=""></a>
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-title ">
                                                <h4 class="post-title font-weight-800"><a href="https://news.bitcoin.com/economist-peter-schiff-explains-why-bitcoin-and-gold-are-up-this-year-theyre-rising-for-opposite-reasons/">Economist Peter Schiff Explains Why Bitcoin and Gold Are up This Year — 'They're Rising for Opposite Reasons'</a></h4>
                                            </div>
                                            <div class="wt-post-meta ">
                                                <ul>
                                                    <li class="post-date"><i class="fa fa-calendar"></i><strong>25 Jan</strong> <span> 2023</span></li>
                                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="https://news.bitcoin.com/economist-peter-schiff-explains-why-bitcoin-and-gold-are-up-this-year-theyre-rising-for-opposite-reasons/">Bitcoin.com</a> </li>
                                                </ul>
                                            </div>
                                            <div class="wt-post-text">
                                                <p>Economist and gold bug Peter Schiff has explained why bitcoin and gold are going up this year...</p> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="blog-post latest-blog-3 blog-md date-style-2 clearfix">
                                        <div class="wt-post-media wt-img-effect zoom-slow">
                                            <a href="https://news.bitcoin.com/iran-and-russia-consider-issuing-gold-backed-stablecoin-officials-unveil/"><img src="https://static.news.bitcoin.com/wp-content/uploads/2023/01/shutterstock_1570397893-380x214.jpg" alt=""></a>
                                        </div>
                                        <div class="wt-post-info">
                                            <div class="wt-post-title ">
                                                <h4 class="post-title font-weight-800"><a href="https://news.bitcoin.com/iran-and-russia-consider-issuing-gold-backed-stablecoin-officials-unveil/">Iran and Russia Consider Issuing Gold-Backed Stablecoin, Officials Unveil</a></h4>
                                            </div>
                                            <div class="wt-post-meta ">
                                                <ul>
                                                    <li class="post-date"><i class="fa fa-calendar"></i><strong>18 Jan</strong> <span> 2023</span></li>
                                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="https://news.bitcoin.com/iran-and-russia-consider-issuing-gold-backed-stablecoin-officials-unveil/">Bitcoin.com</a> </li>
                                                </ul>
                                            </div>
                                            <div class="wt-post-text">
                                                <p>Tehran and Moscow are discussing the possible launch of a stablecoin for international settlements...</p> 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LATEST BLOG SECTION END -->

                <!-- SECTION CONTENT START -->
                <div id="faq" class="section-full  p-tb80 bg-full-height bg-repeat-x graph-slide-image" style="background-image:url({{ asset('website-assets/images/background/bg-1.jpg?v=20230127233845') }});">
                    
                    <div class="container">
                        <!-- TITLE -->
                        <div class="section-head text-center">
                            <h2 class="text-uppercase text-white">FAQ</h2>
                            <div class="wt-separator-outer">
                                <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                        <!-- TITLE -->

                        <div class="row">
                            <div class="col-md-12">
                                <!-- ACCORDION START -->
                                <div class="wt-accordion acc-bg-gray" id="accordion5">
                                
                                    <div class="panel wt-panel">
                                        <div class="acod-head acc-actives">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseOne5" data-parent="#accordion5" >
                                                    What is kryptomusk?
                                                    <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseOne5" class="acod-body collapse in">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                Krypto Musk is one of the first hybrid trading platform where you can invest and earn daily returns                                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseTwo5" class="collapsed" data-parent="#accordion5">
                                                    How Does kryptomusk generate profits?
                                                    <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseTwo5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                Krypto Musk traders with top centralized and decentralised  crypto currency and generate profits every day
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                            <a data-toggle="collapse"  href="#collapseThree5" class="collapsed"  data-parent="#accordion5">
                                            What is the mission of kryptomusk?
                                            <span class="indicator"><i class="fa fa-plus"></i></span>
                                            </a>
                                        </h3>
                                        </div>
                                        <div id="collapseThree5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                The mission is to give end users the convenience of a centralized exchange while also giving them the security and freedom of a decentralized exchange.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseFour5" data-parent="#accordion5" >
                                                    Where is the headquarters of kryptomusk?
                                                    <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseFour5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                Company headquartered in United Kingdom
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseFive5" class="collapsed" data-parent="#accordion5">
                                                How Can One join kryptomusk?
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseFive5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                You can join here in kryptomusk using the registration link,if you got any questions you can contact support team
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseSix5" class="collapsed" data-parent="#accordion5">
                                                How many types of profit are there?
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseSix5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                There are 3 type of profit
                                                <p class="mb-0">1. Daily income</p>
                                                <p class="mb-0">2. Refferal income</p>
                                                <p class="mb-0">3. Binary income</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel wt-panel">
                                        <div class="acod-head">
                                            <h3 class="acod-title">
                                                <a data-toggle="collapse" href="#collapseSeven5" class="collapsed" data-parent="#accordion5">
                                                When can you withdrawal your profits?
                                                <span class="indicator"><i class="fa fa-plus"></i></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div id="collapseSeven5" class="acod-body collapse">
                                            <div class="acod-content p-tb15 text-white font-16">
                                                You can withdraw your daily income on every Saturday and binary income and refferal income on every day. It will take 24 hours to proceed.
                                            </div>
                                        </div>
                                    </div>
                    
                                </div>
                                <!-- ACCORDION END -->  
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- SECTION CONTENT  END --> 
                
                <!-- SECTION TABLE START -->
                <div class="section-full p-t80 p-b50">
                    <div class="container">
                        <!-- TABLE RESPONSIVE -->
                        <div class="section-head text-center">
                            <h2 class="text-uppercase">Cryptocurrency Allowed</h2>
                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            <p>We accept investment in below crypto currency.</p>
                        </div>
                        
                        <div id="no-more-tables">
                            <div class="row">
                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/bitcoin.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Bitcoin </p>
                                </div>

                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/ethereum-coin.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Ethereum </p>
                                </div>

                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/doge.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Doge Coin </p>
                                </div>

                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/litecoin.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Litecoin </p>
                                </div>
                            
                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/shibainu.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Shiba Inu </p>
                                </div>

                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/tether.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Tether </p>
                                </div>

                                <div class="text-center col-6 col-md-3">
                                    <img src="{{ asset('website-assets/images/coin-icon/matic.png?v=20230127233845') }}" width="72" height="72" class="p-r10" alt="">
                                    <p> Matic </p>
                                </div>
                            </div>

                        </div>                                   
                    </div>
                </div>
                <!-- SECTION TABLE  END -->  

                <!-- Secured By SECTION START  -->
                <div class="section-full  p-tb80 bg-full-height bg-repeat-x graph-slide-image" style="background-image:url({{ asset('website-assets/images/background/bg-1.jpg?v=20230127233845') }});">
                    <div class="container">
                        <!-- TITLE START-->
                        <div class="section-head text-center">
                            <span class="wt-title-subline font-16 text-gray-dark m-b15">Our Website Secured By</span>
                            <h2 class="text-uppercase">Secured By</h2>
                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga eos optio ducimus odit, labore hic fugiat iusto veniam necessitatibus quas doloremque sapiente maiores.</p> --}}
                        </div>
                        <!-- TITLE END-->
                        <div class="section-content no-col-gap">
                            <div class="row">
                                <div class="col-md-3 col-sm-6 step-number-block">
                                    <div class="wt-icon-box-wraper center p-a30 bg-white m-a5">
                                        <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/security/Lets-Encrypt-Logo.png?v=20230127233845') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 step-number-block">
                                    <div class="wt-icon-box-wraper center p-a30 bg-white m-a5">
                                        <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/security/Cloudflare-Logo.png?v=20230127233845') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 step-number-block">
                                    <div class="wt-icon-box-wraper center p-a30 bg-white m-a5">
                                        <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/security/ncl.png?v=20230127233845') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 step-number-block">
                                    <div class="wt-icon-box-wraper center p-a30 bg-white m-a5">
                                        <a href="#" class="icon-cell"><img src="{{ asset('website-assets/images/security/duoLogo-web.png?v=20230127233845') }}" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- Secured By  SECTION END -->

                <!-- DOCUMENTS SECTION START  -->
                <div id="documets" class="section-full  p-t80 p-b80 bg-gray">
                    <div class="container">
                        <!-- TITLE START-->
                        <div class="section-head text-center">
                            <h2 class="text-uppercase">Company Documents</h2>
                            <div class="wt-separator-outer"><div class="wt-separator bg-primary"></div></div>
                        </div>
                        <!-- TITLE END-->
                        <div class="section-content no-col-gap">
                            <div class="d-flex justify-content-center">
                                <div class="">
                                    <a target="_blank" href="{{ asset('website-assets/docs/087-554407_20221228_14558382.pdf') }}" class="site-button text-uppercase m-r15">Company License</a>
                                </div>
                                <div class="">
                                    <a target="_blank" href="{{ asset('website-assets/docs/087-554407_20221223-135802_14727.pdf') }}" class="site-button text-uppercase m-r15">Company Capital</a>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- documets  SECTION END -->
                                        
            </div>
            <!-- CONTENT END -->
            
            <!-- FOOTER START -->
            <footer class="site-footer footer-dark bg-no-repeat bg-full-height bg-center "  style="background-image:url({{ asset('website-assets/images/background/footer-bg.jpg?v=20230127233845') }});">
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
                                        <a href="{{ url('/') }}"><img src="{{ asset('website-assets/images/logo-white.png?v=20230127233845') }}" width="230" height="67" alt=""/></a>
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
                                            <a href="#aboutUs">About Us</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#trading">Trading</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#packages">Packages</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#faq">Faq</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#contactUs">Contact Us</a>
                                        </li>
                                        
                                        <li>
                                            <a href="#documents">Company Documents</a>
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
                                            <p class="m-b0"><a target="_blank" href="https://api.whatsapp.com/send?phone=447362049625">(+44) 736 204 9625</a></p>
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
                        <img src="{{ asset('website-assets/images/favicon-white.png?v=20230127233845') }}" width="230" height="67" alt="" />
                    </div>
                    <div class="step" id="cssload-s1"></div>
                    <div class="step" id="cssload-s2"></div>
                    <div class="step" id="cssload-s3"></div>
                </div>
            </div>
        </div>
        <!-- LOADING AREA  END -->

        <!-- JAVASCRIPT  FILES ========================================= --> 
        <script src="{{ asset('website-assets/js/jquery-1.12.4.min.js?v=20230127233845') }}"></script><!-- JQUERY.MIN JS -->
        <script   src="{{ asset('website-assets/js/bootstrap.min.js?v=20230127233845') }}"></script><!-- BOOTSTRAP.MIN JS -->

        <script   src="{{ asset('website-assets/js/bootstrap-select.min.js?v=20230127233845') }}"></script><!-- FORM JS -->
        <script   src="{{ asset('website-assets/js/jquery.bootstrap-touchspin.min.js?v=20230127233845') }}"></script><!-- FORM JS -->

        <script   src="{{ asset('website-assets/js/magnific-popup.min.js?v=20230127233845') }}"></script><!-- MAGNIFIC-POPUP JS -->

        <script   src="{{ asset('website-assets/js/waypoints.min.js?v=20230127233845') }}"></script><!-- WAYPOINTS JS -->
        <script   src="{{ asset('website-assets/js/counterup.min.js?v=20230127233845') }}"></script><!-- COUNTERUP JS -->
        <script   src="{{ asset('website-assets/js/waypoints-sticky.min.js?v=20230127233845') }}"></script><!-- COUNTERUP JS -->

        <script  src="{{ asset('website-assets/js/isotope.pkgd.min.js?v=20230127233845') }}"></script><!-- MASONRY  -->

        <script   src="{{ asset('website-assets/js/owl.carousel.min.js?v=20230127233845') }}"></script><!-- OWL  SLIDER  -->

        <script   src="{{ asset('website-assets/js/stellar.min.js?v=20230127233845') }}"></script><!-- PARALLAX BG IMAGE   --> 
        <script   src="{{ asset('website-assets/js/scrolla.min.js?v=20230127233845') }}"></script><!-- ON SCROLL CONTENT ANIMTE   -->

        <script   src="{{ asset('website-assets/js/custom.js?v=20230127233845') }}"></script><!-- CUSTOM FUCTIONS  -->
        <script   src="{{ asset('website-assets/js/shortcode.js?v=20230127233845') }}"></script><!-- SHORTCODE FUCTIONS  -->
        <script   src="{{ asset('website-assets/js/switcher.js?v=20230127233845') }}"></script><!-- SWITCHER FUCTIONS  -->
        <script  src="{{ asset('website-assets/js/jquery.bgscroll.js?v=20230127233845') }}"></script><!-- BACKGROUND SCROLL -->
        <script  src="{{ asset('website-assets/js/tickerNews.min.js?v=20230127233845') }}"></script><!-- TICKERNEWS-->
        <!-- TICKERNEWS FUNCTiON -->
        <script type="text/javascript">
            jQuery(function(){
                var timer = !1;
                _Ticker = jQuery("#T1").newsTicker();
                _Ticker.on("mouseenter",function(){
                    var __self = this;
                    timer = setTimeout(function(){
                        __self.pauseTicker();
                    },200);
                });
                _Ticker.on("mouseleave",function(){
                    clearTimeout(timer);
                    if(!timer) return !1;
                    this.startTicker();
                });
            });
        </script>
        <!-- REVOLUTION JS FILES -->

        <script  src="{{ asset('website-assets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js?v=20230127233845') }}"></script>
        <script  src="{{ asset('website-assets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js?v=20230127233845') }}"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
        <script  src="{{ asset('website-assets/plugins/revolution/revolution/js/extensions/revolution-plugin.js?v=20230127233845') }}"></script>

        <!-- REVOLUTION SLIDER FUNCTION  ===== -->
        <script   src="{{ asset('website-assets/js/rev-script-1.js?v=20230127233845') }}"></script>
    </body>    
</html>
