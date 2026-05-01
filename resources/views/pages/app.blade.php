<!DOCTYPE html>
<html class="no-js" lang="az">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('description', 'AliyevStudio - Bakıda rəqəmsal agentlik. Veb saytların yığılması, mobil tətbiqlərin hazırlanması, UI/UX dizayn, brendinq və sıfırdan peşəkar Flutter kursları.')">
    <meta name="keywords" content="@yield('keywords', 'veb dizayn, veb saytlarin yigilmasi, mobil tetbiqlerin hazirlanmasi, flutter kurslari, proqramlasdirma kurslari baku, aliyevstudio, rəqəmsal agentlik bakı, ui/ux dizayn, seo xidməti')">
    <meta name="author" content="AliyevStudio">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('title', 'AliyevStudio | Peşəkar Veb Dizayn, Mobil Tətbiqlər və Flutter Kursları')">
    <meta property="og:description" content="@yield('description', 'Biznesinizi rəqəmsal dünyada böyüdün. İntuitiv veb tətbiqlər, interaktiv rəqəmsal təcrübələr və proqramlaşdırma dərsləri.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Google Analytics (GA4) və Search Console Təsdiq Kodları üçün yer -->
    <meta name="google-site-verification" content="E0MvoUO2tD892KbTpCguH3kEspiBazMCKe7p1Xn54EU" />
    
    <!-- Site Title -->
    <title>@yield('title', 'AliyevStudio | Veb Saytların Yığılması, Mobil Tətbiqlər və Flutter Kursları')</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/carouselTicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ filemtime(public_path('assets/css/main.css')) }}">
</head>

<body>
    <!-- header-area-start -->
    <header class="header sticky-active">
        <div class="primary-header">
            <div class="primary-header-inner">
                <div class="header-logo d-lg-block">
                    <a href="{{asset('')}}">
                        <img class="logo-dark" src="{{ asset('assets/img/logo/logo-2.png') }}" alt="Logo">
                        <img class="logo-light" src="{{ asset('assets/img/logo/logo-3.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="header-right-wrap">
                    <div class="header-menu-wrap">
                        <div class="mobile-menu-items">
                            <ul>
                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                    <a href="{{asset('')}}">Ana səhİfə</a>
                                </li>
                                <li class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">
                                    <a href="{{route('portfolio')}}">Portfolİo</a>
                                </li>
                                <li class="{{ request()->routeIs('services') ? 'active' : '' }}">
                                    <a href="{{route('services')}}">Xİdmətlərİmİz</a>
                                </li>
                                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                    <a href="{{route('about')}}">Haqqımızda</a>
                                </li>
                                <li class="{{ request()->routeIs('blog') ? 'active' : '' }}">
                                    <a href="{{route('blog')}}">Blog</a>
                                </li>
                                <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                    <a href="{{route('contact')}}">Əlaqə</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.header-menu-wrap -->
                    <div class="header-right">
                        <div class="sidebar-icon">
                            <button class="sidebar-trigger open">
                                <svg width="24" height="23" viewBox="0 0 24 23" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.300781 0H5.30078V5H0.300781V0Z" fill="currentColor" />
                                    <path d="M0.300781 9H5.30078V14H0.300781V9Z" fill="currentColor" />
                                    <path d="M0.300781 18H5.30078V23H0.300781V18Z" fill="currentColor" />
                                    <path d="M9.30078 0H14.3008V5H9.30078V0Z" fill="currentColor" />
                                    <path d="M9.30078 9H14.3008V14H9.30078V9Z" fill="currentColor" />
                                    <path d="M9.30078 18H14.3008V23H9.30078V18Z" fill="currentColor" />
                                    <path d="M18.3008 0H23.3008V5H18.3008V0Z" fill="currentColor" />
                                    <path d="M18.3008 9H23.3008V14H18.3008V9Z" fill="currentColor" />
                                    <path d="M18.3008 18H23.3008V23H18.3008V18Z" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- /.header-right -->
                </div>
            </div>
            <!-- /.primary-header-inner -->
        </div>
    </header>
    <!-- /.Main Header -->
    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Açar sözləri bura yazın...">
            </form>
            <div class="search-close">
                <i class="fa-sharp fa-regular fa-xmark"></i>
            </div>
        </div>
    </div>
    <!-- /#popup-search-box -->
    <div class="mobile-side-menu">
        <div class="side-menu-content">
            <div class="side-menu-head">
                <a href="{{asset('')}}">
                    <img src="{{ asset('assets/img/logo/logo-2.png') }}" alt="logo">
                </a>
                <button class="mobile-side-menu-close">
                    <i class="fa-regular fa-xmark"></i>
                </button>
            </div>
            <div class="side-menu-wrap"></div>
            <ul class="side-menu-list">
                <li>
                    <i class="fa-light fa-location-dot"></i>
                    Ünvan : <span>Azərbaycan, Bakı, Dəmirçi Plaza</span>
                </li>
                <li>
                    <i class="fa-light fa-phone"></i>
                    Telefon : <a href="tel:+994556691248">+994(55)669 12 48</a>
                </li>
                <li>
                    <i class="fa-light fa-envelope"></i>
                    E-poçt : <a href="mailto:info@aliyevstudio.com">info@aliyevstudio.com</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.mobile-side-menu -->
    <div class="mobile-side-menu-overlay"></div>
    <div id="preloader">
        <div class="loading" data-loading-text="Aliyevstudio"></div>
    </div>
    <!-- ./ preloader -->
    <div id="sidebar-area" class="sidebar-area">
        <button class="sidebar-trigger close">
            <svg class="sidebar-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" width="16px" height="12.7px" viewBox="0 0 16 12.7"
                style="enable-background: new 0 0 16 12.7" xml:space="preserve">
                <g>
                    <rect x="0" y="5.4" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.1569 7.5208)" width="16"
                        height="2"></rect>
                    <rect x="0" y="5.4" transform="matrix(0.7071 0.7071 -0.7071 0.7071 6.8431 -3.7929)" width="16"
                        height="2"></rect>
                </g>
            </svg>
        </button>
        <div class="side-menu-content">
            <div class="side-menu-logo">
                <a class="dark-img" href="{{asset('')}}">
                    <img src="{{ asset('assets/img/logo/logo-2.png') }}" alt="logo">
                </a>
                <a class="light-img" href="{{asset('')}}">
                    <img src="{{ asset('assets/img/logo/logo-3.png') }}" alt="logo">
                </a>
            </div>
            <div class="side-menu-wrap"></div>
            <div class="side-menu-about">
                <div class="side-menu-header">
                    <h3>Haqqımızda</h3>
                </div>
                <p>Agentliyimiz yüksək keyfiyyətli rəqəmsal xidmətlər təqdim etməklə markanızın onlayn mühitdə uğur qazanmasını təmin edir. Birlikdə daha böyük hədəflərə çatacağıq.</p>
                <a href="{{route('contact')}}" class="rr-primary-btn">Bizimlə Əlaqə</a>
            </div>
            <div class="side-menu-contact">
                <div class="side-menu-header">
                    <h3>Əlaqə</h3>
                </div>
                <ul class="side-menu-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Azərbaycan, Bakı, Dəmirçi  Plaza </p>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+000123456789">+994(55)669 12 48</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope-open-text"></i>
                        <a href="mailto:runokcontact@gmail.com">info@aliyevstudio.com</a>
                    </li>
                </ul>
            </div>
            <ul class="side-menu-social">
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="instagram">
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="g-plus">
                    <a href="#">
                        <i class="fab fa-fab fa-google-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    @yield('content')

    <!--scrollup-->
    <div id="theme-toogle" class="switcher-button">
        {{-- <div class="switcher-button-inner-left"></div> --}}
        <div class="switcher-button-inner"></div>
    </div>

    {{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4667451139751581"
     crossorigin="anonymous"></script> --}}
     
    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquary-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/meanmenu.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.isotope.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/split-type.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/scroll-trigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/scroll-smoother.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.carouselTicker.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/magiccursor.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HNLLRBMNJB"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-HNLLRBMNJB');
    </script>
</body>

</html>