<!DOCTYPE html>
<html
    dir="@if (session()->has('language_direction_from_dropdown')) @if (session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif
@else
{{ __('ltr') }} @endif"
    lang="@if (session()->has('language_code_from_dropdown')) {{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-', $language->language_code) }} @endif">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="title" content="@if (isset($general_seo)) {{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)) {{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)) {{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($general_seo)) {{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)) {{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)) {{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)) {{ $general_seo->site_desc }} @endif">
    <meta property="og:image"
        content="@if (!empty($general_site_image->favicon_image)) {{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta itemprop="image"
        content="@if (!empty($general_site_image->favicon_image)) {{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
        content="@if (!empty($general_site_image->favicon_image)) {{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)) {{ $general_seo->site_name }} @endif">
    <meta property="twitter:description"
        content="@if (isset($general_seo)) {{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) -
            {{ $general_seo->site_name }} @endif
    </title>

    @if (!empty($general_site_image->favicon_image))
        <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/' . $general_site_image->favicon_image) }}" sizes="128x128"
            rel="shortcut icon" type="image/x-icon" />
        <link href="{{ asset('uploads/img/general/' . $general_site_image->favicon_image) }}" sizes="128x128"
            rel="shortcut icon" />
    @else
        <!-- Favicon -->
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon"
            type="image/x-icon" />
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon" />
    @endif

    <!--// Boostrap  //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/animate.min.css') }}">
    <!--// Vegas Slider Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/vegas.slider.min.css') }}">
    <!--// Owl Carousel //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.min.css') }}">
    <!--// Owl Carousel Default //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/owl.carousel.default.min.css') }}">
    <!--// Font Awesome //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/font_awesome/css/all.css') }}">
    <!--// Flat Icons //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/flat_icons/flaticon.css') }}">
    <!--// Theme Main Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <!--// Theme Color Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/default-color.css') }}" id="theme-color-toggle" />

    <!--// Color Option Css //-->
    @isset($color_option)

        @if ($color_option->color_option == 1)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/blue-color.css') }}">
        @elseif ($color_option->color_option == 2)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/red-color.css') }}">
        @elseif ($color_option->color_option == 3)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/yellow-color.css') }}">
        @elseif ($color_option->color_option == 4)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/green-color.css') }}">
        @elseif ($color_option->color_option == 5)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/pink-color.css') }}">
        @elseif ($color_option->color_option == 6)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/turquose-color.css') }}">
        @elseif ($color_option->color_option == 7)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/purple-color.css') }}">
        @elseif ($color_option->color_option == 8)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/blue-color-2.css') }}">
        @elseif ($color_option->color_option == 9)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/orange-color.css') }}">
        @elseif ($color_option->color_option == 10)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/magenta-color.css') }}">
        @elseif ($color_option->color_option == 11)
            <link rel="stylesheet" href="{{ asset('assets/frontend/css/skins/orange-color-2.css') }}">
        @endif

    @endisset

    @if (isset($google_analytic))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>

<body data-spy="scroll" data-target="#fixedNavbar"
    @if (session()->has('language_direction_from_dropdown')) @if (session()->get('language_direction_from_dropdown') == 1)  class="rtl-mode" @endif
@elseif(isset($language)) @if ($language->direction == 1) class="rtl-mode" @endif @endif >

    <!--// Page Wrapper Start //-->
    <div class="page-wrapper" id="wrapper">

        <!--// Header Start //-->
        <header class="header fixed-top" id="header">
            <div id="nav-menu-wrap">
                <div class="container">
                    <nav class="navbar navbar-expand-lg p-0">
                        @if (!empty($general_site_image->site_colored_logo_image))
                            <a class="navbar-brand" title="Home" href="{{ url('/') }}">
                                <img src="{{ asset('uploads/img/general/' . $general_site_image->site_white_logo_image) }}"
                                    alt="Logo White" class="img-fluid logo-transparent">
                                <img src="{{ asset('uploads/img/general/' . $general_site_image->site_colored_logo_image) }}"
                                    alt="Logo Black" class="img-fluid logo-normal">
                            </a>
                        @else
                            <a class="navbar-brand" title="Home" href="#">
                                <img src="{{ asset('uploads/img/dummy/white-logo.png') }}" alt="Logo White"
                                    class="img-fluid logo-transparent">
                                <img src="{{ asset('uploads/img/dummy/colored-logo.png') }}" alt="Logo Black"
                                    class="img-fluid logo-normal">
                            </a>
                        @endif
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#fixedNavbar" aria-controls="fixedNavbar" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="togler-icon-inner">
                                <span class="line-1"></span>
                                <span class="line-2"></span>
                                <span class="line-3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link menu-link" href="#"
                                        data-scroll-nav="1">{{ __('frontend.home') }}</a>
                                </li>
                                @if ($section_arr['about_us_section'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#"
                                            data-scroll-nav="2">{{ __('frontend.about_us') }}</a>
                                    </li>
                                @endif
                                @if ($section_arr['service_section'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#"
                                            data-scroll-nav="3">{{ __('frontend.services') }}</a>
                                    </li>
                                @endif
                                @if ($section_arr['portfolio_section'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#"
                                            data-scroll-nav="4">{{ __('frontend.portfolio') }}</a>
                                    </li>
                                @endif
                                @if ($section_arr['blog_section'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link"
                                            href="{{ route('blog-page.index') }}">{{ __('frontend.blogs') }}</a>
                                    </li>
                                @endif
                                @if ($section_arr['page_menu'] == 1)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="pageDropdownMenu"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ __('frontend.pages') }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="pageDropdownMenu">
                                            @foreach ($header_pages as $header_page)
                                                <a class="dropdown-item"
                                                    href="{{ route('any-page.show', ['page_slug' => $header_page->page_slug]) }}">{{ $header_page->page_title }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                                @if ($section_arr['contact_section'] == 1)
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="#"
                                            data-scroll-nav="7">{{ __('frontend.contact') }}</a>
                                    </li>
                                @endif
                                @if (count($display_dropdowns) > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="pageDropdownMenu"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            @if (session()->has('language_name_from_dropdown'))
                                                {{ session()->get('language_name_from_dropdown') }}
                                            @else
                                                {{-- {{ $language->language_name }} --}}
                                                {{-- <i class="fa-regular fa-earth-americas"></i> --}}
                                                <img src="{{ asset('uploads/img/earth (1).png') }}" alt="mmmmm">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="pageDropdownMenu">
                                            @foreach ($display_dropdowns as $display_dropdown)
                                                <a class="dropdown-item"
                                                    href="{{ url('language/set-locale/' . $display_dropdown->id) }}">{{ $display_dropdown->language_name }}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                                @isset($external_url)
                                    @if ($external_url->status == 1)
                                        <li class="nav-item navbar-btn-resp d-flex align-items-center">
                                            <a href="{{ $external_url->btn_link }}" class="primary-btn">
                                                <span class="text">{{ $external_url->btn_name }}</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </li>
                                    @endif
                                @endisset
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!--// Header End  //-->

        <!--// Main Area Start //-->
        <main class="main-area">

            <!--// Hero Section Start //-->
            @if (session()->has('choose_version'))
                @if (session()->get('choose_version') == 0)
                    @isset($fixed_content)
                        <section class="hero-banner" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>{{ $fixed_content->title }}</h1>
                                            <h2>{{ $fixed_content->desc }}</h2>
                                            @if (!empty($fixed_content->btn_name))
                                                <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                    class="white-btn">
                                                    <span class="text">{{ $fixed_content->btn_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image))
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                            data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/general/' . $fixed_content->thumbnail_image) }}"
                                                            alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                        data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="{{ asset('uploads/img/dummy/354x354.jpg') }}"
                                                        title="ajency image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com" class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endisset
                @elseif (session()->get('choose_version') == 1)
                    @isset($fixed_content)
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>{{ $fixed_content->title }}</h1>
                                            <h2>{{ $fixed_content->desc }}</h2>
                                            @if (!empty($fixed_content->btn_name))
                                                <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                    class="white-btn">
                                                    <span class="text">{{ $fixed_content->btn_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image))
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                            data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/general/' . $fixed_content->thumbnail_image) }}"
                                                            alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                        data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="{{ asset('uploads/img/dummy/354x354.jpg') }}"
                                                        title="HovyLee phone image" alt="HovyLee phone image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com" class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endisset
                @elseif (session()->get('choose_version') == 2)
                    @if (isset($fixed_content) || count($sliders) > 0)
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            @isset($fixed_content)
                                                <h1>{{ $fixed_content->title }}</h1>
                                                <h2>{{ $fixed_content->desc }}</h2>
                                                @if (!empty($fixed_content->btn_name))
                                                    <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                        class="white-btn">
                                                        <span class="text">{{ $fixed_content->btn_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and
                                                move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com"
                                class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endif
                @else
                    @if (isset($fixed_content) || isset($video))
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            @isset($video->video_link)
                                <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                    data-property="{videoURL:'{{ $video->video_link }}',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                                </div>
                            @endisset
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            @isset($fixed_content)
                                                <h1>{{ $fixed_content->title }}</h1>
                                                <h2>{{ $fixed_content->desc }}</h2>
                                                @if (!empty($fixed_content->btn_name))
                                                    <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                        class="white-btn">
                                                        <span class="text">{{ $fixed_content->btn_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                            </div>
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and
                                                move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com"
                                class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endif
                @endif
            @else
                @if ($homepage_version->choose_version == 0)
                    @isset($fixed_content)
                        <section class="hero-banner" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>{{ $fixed_content->title }}</h1>
                                            <h2>{{ $fixed_content->desc }}</h2>
                                            @if (!empty($fixed_content->btn_name))
                                                <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                    class="white-btn">
                                                    <span class="text">{{ $fixed_content->btn_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image))
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                            data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/general/' . $fixed_content->thumbnail_image) }}"
                                                            alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" data-scroll-index="1">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                        data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="{{ asset('uploads/img/dummy/354x354.jpg') }}"
                                                        title="ajency image" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com" class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endisset
                @elseif ($homepage_version->choose_version == 1)
                    @isset($fixed_content)
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>{{ $fixed_content->title }}</h1>
                                            <h2>{{ $fixed_content->desc }}</h2>
                                            @if (!empty($fixed_content->btn_name))
                                                <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                    class="white-btn">
                                                    <span class="text">{{ $fixed_content->btn_name }}</span>
                                                    <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    @if ($fixed_content->image_status == 1 && !empty($fixed_content->thumbnail_image))
                                        <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                            data-wow-duration="0.7s" data-wow-delay="0.5s">
                                            <div class="hero-img">
                                                <div class="border-line-outer">
                                                    <div class="border-line-inner">
                                                        <img src="{{ asset('uploads/img/general/' . $fixed_content->thumbnail_image) }}"
                                                            alt="image" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="hero-particles-effect" data-scroll-index="1">
                            <div id="heroparticles"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-xl-6 col-md-12 hero-img-resp wow fadeInUp"
                                        data-wow-duration="0.7s" data-wow-delay="0.5s">
                                        <div class="hero-img">
                                            <div class="border-line-outer">
                                                <div class="border-line-inner">
                                                    <img src="{{ asset('uploads/img/dummy/354x354.jpg') }}"
                                                        title="HovyLee phone image" alt="HovyLee phone image"
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com" class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endisset
                @elseif ($homepage_version->choose_version == 2)
                    @if (isset($fixed_content) || count($sliders) > 0)
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12 wow fadeInUp text-center">
                                        <div class="hero-inner">
                                            @isset($fixed_content)
                                                <h1>{{ $fixed_content->title }}</h1>
                                                <h2>{{ $fixed_content->desc }}</h2>
                                                @if (!empty($fixed_content->btn_name))
                                                    <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                        class="white-btn">
                                                        <span class="text">{{ $fixed_content->btn_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="heroSliderContainer" data-scroll-index="1">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and
                                                move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com"
                                class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endif
                @else
                    @if (isset($fixed_content) || isset($video))
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            @isset($video->video_link)
                                <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                    data-property="{videoURL:'{{ $video->video_link }}',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                                </div>
                            @endisset
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            @isset($fixed_content)
                                                <h1>{{ $fixed_content->title }}</h1>
                                                <h2>{{ $fixed_content->desc }}</h2>
                                                @if (!empty($fixed_content->btn_name))
                                                    <a href="@if (!empty($fixed_content->btn_link)) {{ $fixed_content->btn_link }} @else # @endif"
                                                        class="white-btn">
                                                        <span class="text">{{ $fixed_content->btn_name }}</span>
                                                        <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (count($socials) > 0)
                                <ul class="hero-social-list">
                                    @foreach ($socials as $social)
                                        <li><a
                                                href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            @endif
                            @if (!empty($site_info->email))
                                <a href="mailto:{{ $site_info->email }}"
                                    class="hero-email-link">{{ $site_info->email }}</a>
                            @endif
                            <a href="#" data-scroll-nav="2"
                                class="scroll-down-btn">{{ __('frontend.scroll_down') }}</a>
                        </section>
                    @else
                        <section class="hero-banner" id="hero_video" data-scroll-index="1">
                            <div id="video-background" data-video-bg="true" class="player bg-overlay"
                                data-property="{videoURL:'https://www.youtube.com/watch?v=yI7UHzq_4XY',containment:'#hero_video',showControls:false, autoPlay:true, loop:true, mute:true, startAt:0, opacity:1, quality:'default'}">
                            </div>
                            <div class="hero-overlay"></div>
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-xl-6 col-md-10 wow fadeInUp">
                                        <div class="hero-inner">
                                            <h1>
                                                Introduce Our
                                                Creative Agency.
                                            </h1>
                                            <h2>
                                                Always new beginnings can move the business forward.A user experience is
                                                required before service.Now is a great opportunity to work with our and
                                                move
                                                your brand forward.
                                            </h2>
                                            <a href="#" class="white-btn">
                                                <span class="text">View Works</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="hero-social-list">
                                <li><a href="javascript:void(0)"><i class="fab fa-github"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <a href="mailto:digitalteam@example.com"
                                class="hero-email-link">digitalteam@example.com</a>
                            <a href="#" data-scroll-nav="2" class="scroll-down-btn">Scroll Down</a>
                        </section>
                    @endif
                @endif
            @endif

            <!--// Hero Section End //-->

            <!--// About Section Start //-->
            @if ($section_arr['about_us_section'] == 1)
                @if (isset($about))
                    <section class="section" id="about" data-scroll-index="2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="about-img wow fadeInUp" data-wow-duration="0.5s"
                                        data-wow-delay="0.2s">
                                        <img src="{{ asset('uploads/img/about/' . $about->about_image) }}"
                                            alt="About image" title="About image" class="img-fluid">
                                        @if (!empty($about->video_link))
                                            <a class="about-video-btn" href="{{ $about->video_link }}"><i
                                                    class="fa fa-play"></i></a>
                                            <div class="video-border-line"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="about-inner wow fadeInUp" data-wow-duration="0.5s"
                                        data-wow-delay="0.1s">
                                        <h6>{{ $about->section_title }}</h6>
                                        <h2>{{ $about->title }}</h2>
                                        <p>{{ $about->desc }}</p>
                                        <div class="row">
                                            @foreach ($info_lists->chunk(3) as $info_list)
                                                @foreach ($info_list as $item)
                                                    <div class="col-md-6 col-sm-6">
                                                        <ul class="mb-resp-15">
                                                            <li>
                                                                <div class="text">
                                                                    <h5>{{ $item->title }}</h5>
                                                                    <p>{{ $item->desc }}</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            @endforeach

                                        </div>

                                        @if (!empty($about->cv_file))
                                            <a href="{{ asset('uploads/img/about/' . $about->cv_file) }}"
                                                class="primary-btn" download>
                                                <span class="text">{{ __('frontend.download') }}</span>
                                                <span class="icon"><i class="fa fa-download"></i></span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section" id="about" data-scroll-index="2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="about-img wow fadeInUp" data-wow-duration="0.5s"
                                        data-wow-delay="0.2s">
                                        <img src="{{ asset('uploads/img/dummy/480x600.jpg') }}" alt="About image"
                                            title="About image" class="img-fluid">
                                        <a class="about-video-btn"
                                            href="https://www.youtube.com/watch?v=YqQx75OPRa0"><i
                                                class="fa fa-play"></i></a>
                                        <div class="video-border-line"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="about-inner wow fadeInUp" data-wow-duration="0.5s"
                                        data-wow-delay="0.1s">
                                        <h6>About Us</h6>
                                        <h2>We are here with 10 years of user experience</h2>
                                        <p>
                                            We prevent loss of time and indecision in our works.
                                            We offer the best solution to the projects we take and do.
                                            Most of our customers and brands express their satisfaction.
                                            By working with us, we can appeal to a large audience and grow your
                                            business.
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <ul class="mb-resp-15">
                                                    <li>
                                                        <div class="text">
                                                            <h5>Company Name :</h5>
                                                            <p>DigitalTeam</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="text">
                                                            <h5>Country :</h5>
                                                            <p>United States</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="text">
                                                            <h5>Freelance :</h5>
                                                            <p>Available</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <ul>
                                                    <li>
                                                        <div class="text">
                                                            <h5>Technologies :</h5>
                                                            <p>Java, Php, C#, Python, Flutter</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="text">
                                                            <h5>Languages :</h5>
                                                            <p>English, Deutch, Arabic</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="text">
                                                            <h5>Address :</h5>
                                                            <p>Etowah, TN 37331 United States</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" class="primary-btn">
                                            <span class="text">Download Cv</span>
                                            <span class="icon"><i class="fa fa-download"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// About Section End //-->

            <!--// Resume Section Start //-->
            @if ($section_arr['feature_section'] == 1)
                @if (isset($feature_section) || count($features) > 0)
                    <section class="section pb-minus-76 bg-primary-light" id="myresume">
                        <div class="container">
                            @isset($feature_section)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="section-heading-left text-center">
                                            <!-- <span>{{ $feature_section->section_title }}</span> -->
                                            <span>Services</span>
                                            <h2 class="text-center">{{ $feature_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="row">
                                @foreach ($features as $feature)
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s"
                                        data-wow-delay="0.{{ $loop->index }}s">
                                        <div class="resume-item">
                                            <div class="body">
                                                @if ($feature->type == 'icon')
                                                    @if (!empty($feature->icon))
                                                        <div class="icon-outer-line">
                                                            <div class="icon-inner-line">
                                                                <span class="{{ $feature->icon }}"></span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <img src="{{ asset('uploads/img/features/' . $feature->feature_image) }}"
                                                        class="mr-2 ml-2 img-fluid">
                                                @endif
                                                <div class="text">
                                                    <h5>{{ $feature->title }}</h5>
                                                    @if (!empty($feature->desc))
                                                        <span>{{ $feature->desc }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-minus-76 bg-primary-light" id="myresume">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-heading-left text-center">
                                        <span>Services</span>
                                        <h2 class="text-center">Our Services</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.1s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fab fa-google"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Business Stratagy</h5>
                                                <span>A clear vision and solid determination are required for a strategy
                                                    to not just stay in theory, but to put into practice.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.2s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fab fa-wordpress"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Website Development</h5>
                                                <span>Web developers, or 'devs', do this by using a variety of coding
                                                    languages.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.3s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fab fa-dribbble"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Marketing & Reporting</h5>
                                                <span>Marketing reporting is the process of measuring progress, showing
                                                    value, and identifying actionable steps to improve marketing
                                                    performance and meet your goals.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.4s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fas fa-mobile-alt"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Mobile App Development</h5>
                                                <span>Mobile app development is the act or process by which a mobile app
                                                    is developed for mobile devices, such as personal digital
                                                    assistants, enterprise digital assistants or mobile phones.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.5s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fab fa-amazon"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Sales Manager</h5>
                                                <span>A sales manager is someone who is responsible for leading and
                                                    guiding a team of sales people in an organization.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="0.6s">
                                    <div class="resume-item">
                                        <div class="body">
                                            <div class="icon-outer-line">
                                                <div class="icon-inner-line">
                                                    <span class="fab fa-behance"></span>
                                                </div>
                                            </div>
                                            <div class="text">
                                                <h5>Graphic Designer</h5>
                                                <span>Graphic design is a craft where professionals create visual
                                                    content to communicate messages.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Resume Section End //-->

            <!--// Services Section Start //-->
            @if ($section_arr['service_section'] == 1)
                @if (isset($service_section) || count($services) > 0)
                    <section class="section pb-minus-70" data-scroll-index="3">
                        <div class="container">
                            @isset($service_section)
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>{{ $service_section->section_title }}</span>
                                            <h2>{{ $service_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="row">
                                @foreach ($services as $service)
                                    <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s"
                                        data-wow-delay="0.{{ $loop->index }}s">
                                        <div class="services-item">
                                            <div class="body">
                                                <h4>0{{ $loop->index + 1 }} </h4>
                                                <h5>{{ $service->title }}</h5>
                                                @if (!empty($service->short_desc))
                                                    <p>{{ $service->short_desc }}</p>
                                                @endif
                                                <a
                                                    href="{{ route('service-page.show', ['service_slug' => $service->service_slug]) }}">{{ __('frontend.read_more') }}
                                                    <i class="fa fa-arrow-right"></i></a>
                                            </div>
                                            @if (!empty($service->icon))
                                                <div class="icon">
                                                    <span class="{{ $service->icon }}"></span>
                                                </div>
                                                <div class="icon-border"></div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-minus-70" data-scroll-index="3">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>Services</span>
                                        <h2>Our Services</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s"
                                    data-wow-delay="0.1s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>01</h4>
                                            <h5>Web Design</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fa fa-tablet"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s"
                                    data-wow-delay="0.2s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>02</h4>
                                            <h5>Graphic Design</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fa fa-adjust"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s"
                                    data-wow-delay="0.1s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>03</h4>
                                            <h5>UI/UX Design</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fab fa-uikit"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s"
                                    data-wow-delay="0.1s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>04</h4>
                                            <h5>Content Writing</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fa fa-blog"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s"
                                    data-wow-delay="0.2s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>05</h4>
                                            <h5>Scripts & Plugin</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fa fa-code"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 wow fadeInRight" data-wow-duration="0.5s"
                                    data-wow-delay="0.1s">
                                    <div class="services-item">
                                        <div class="body">
                                            <h4>06</h4>
                                            <h5>Digital Marketing</h5>
                                            <p>
                                                It is a long established fact that a reader will be
                                                distracted by the readable content of a page when
                                                looking at its layout.
                                            </p>
                                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <div class="icon">
                                            <span class="fa fa-bullhorn"></span>
                                        </div>
                                        <div class="icon-border"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Services Section End //-->

            <!--// Counter Section Start //-->
            @if ($section_arr['counter_section'] == 1)
                @if (isset($counter_section) || count($counters) > 0)
                    <section class="section pb-minus-70" id="counters"
                        style="background-image: url({{ asset('uploads/img/dummy/counter-bg.png') }}">
                        <div class="container">
                            @isset($counter_section)
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading light">
                                            <h2>{{ $counter_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="row">
                                @foreach ($counters as $counter)
                                    <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s"
                                        data-wow-delay="0.{{ $loop->index + 1 }}s">
                                        <div class="counter-item">
                                            <h3 class="counter">{{ $counter->timer }}</h3>
                                            <p>{{ $counter->title }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-minus-70" id="counters"
                        style="background-image: url({{ asset('uploads/img/dummy/counter-bg.png') }}">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading light">
                                        <h2>More than 10,000 customers trusted me</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                    <div class="counter-item">
                                        <h3 class="counter">5,700</h3>
                                        <p>Happy Customer</p>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                    <div class="counter-item">
                                        <h3 class="counter">500</h3>
                                        <p>Project Complete</p>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.1s">
                                    <div class="counter-item">
                                        <h3 class="counter">1,250</h3>
                                        <p>Cups Of Coffee</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Counter Section End //-->

            <!--// How I Work Section Start //-->
            @if ($section_arr['work_process_section'] == 1)
                @if (isset($work_process_section) || count($work_processes) > 0)
                    <section class="section bg-dark-blue pb-30">
                        <div class="container">
                            @isset($work_process_section)
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>{{ $work_process_section->section_title }}</span>
                                            <h2>{{ $work_process_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            @php
                                $i = 1;
                                $t = 1;
                            @endphp
                            @foreach ($work_processes->chunk(3) as $work_process)
                                <div class="row">
                                    @foreach ($work_process as $item)
                                        <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s"
                                            data-wow-delay="0.{{ $i++ }}s">
                                            <div class="how-i-work-item">
                                                <div class="number">
                                                    <span>0{{ $t++ }}</span>
                                                </div>
                                                <div class="number-border"></div>
                                                @if ($item->image_status == 'enable' && !empty($item->work_process_image))
                                                    <div class="img">
                                                        <img src="{{ asset('uploads/img/work_process/' . $item->work_process_image) }}"
                                                            class="img-fluid" alt="How i work">
                                                    </div>
                                                @endif
                                                <div class="text">
                                                    <h5>{{ $item->title }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                        </div>
                    </section>
                @else
                    <section class="section bg-dark-blue pb-30">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>How Our Work</span>
                                        <h2>Our prepare your projects in 3 stages</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s">
                                    <div class="how-i-work-item">
                                        <div class="number">
                                            <span>01</span>
                                        </div>
                                        <div class="number-border"></div>
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}"
                                                class="img-fluid" alt="How i work">
                                        </div>
                                        <div class="text">
                                            <h5>Thinking</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s">
                                    <div class="how-i-work-item">
                                        <div class="number">
                                            <span>02</span>
                                        </div>
                                        <div class="number-border"></div>
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}"
                                                class="img-fluid" alt="How i work">
                                        </div>
                                        <div class="text">
                                            <h5>Research</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.6s">
                                    <div class="how-i-work-item">
                                        <div class="number">
                                            <span>03</span>
                                        </div>
                                        <div class="number-border"></div>
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/328x328.jpg') }}"
                                                class="img-fluid" alt="How i work">
                                        </div>
                                        <div class="text">
                                            <h5>Design</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// How I Work Section End //-->

            <!--// Skills Section Start //-->
            @if ($section_arr['skill_section'] == 1)
                @if (isset($skill) || count($skill_info_lists) > 0)
                    <section class="section">
                        <div class="container">
                            <div class="row">
                                @isset($skill)
                                    <div class="col-lg-6 wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                        <div class="skills-img">
                                            <img src="{{ asset('uploads/img/skill/' . $skill->skill_image) }}"
                                                alt="About image" title="About image" class="img-fluid">
                                            <span class="icon-check"><i class="fa fa-check"></i></span>
                                            <div class="icon-border-line"></div>
                                        </div>
                                    </div>
                                @endisset
                                <div class="col-lg-6 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                    <div class="skills-inner">
                                        @isset($skill)
                                            <h6>{{ $skill->section_title }}</h6>
                                            <h2>{{ $skill->title }}</h2>
                                            @if (!empty($skill->desc))
                                                <p>{{ $skill->desc }}</p>
                                            @endif
                                        @endisset
                                        <div class="row">
                                            @foreach ($skill_info_lists as $skill_info_list)
                                                <div class="col-md-6 col-sm-6 skills-item-resp">
                                                    <div class="skills-item">
                                                        <div class="skills-item-text">
                                                            <h5>{{ $skill_info_list->title }}</h5>
                                                        </div>
                                                        <div class="body">
                                                            <h2 class="counter">{{ $skill_info_list->percent_rate }}
                                                            </h2>
                                                            <div class="skills-progress-bar">
                                                                <div class="skills-progress-value slideInLeft wow"
                                                                    data-percent="{{ $skill_info_list->percent_rate }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 d-none wow fadeInDown" data-wow-duration="0.7s"
                                    data-wow-delay="0.3s">
                                    <div class="skills-img">
                                        <img src="{{ asset('uploads/img/dummy/480x600.jpg') }}" alt="About image"
                                            title="About image" class="img-fluid">
                                        <span class="icon-check"><i class="fa fa-check"></i></span>
                                        <div class="icon-border-line"></div>
                                    </div>
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s">
                                    <div class="skills-inner">
                                        <h6>Skills</h6>
                                        <h2>Our specialize in frameworks UI for years</h2>
                                        <p>
                                            A front end library is being released every day and it is requested
                                            to master these technologies.I also follow the market every day and
                                            follow the updates of new frontend frameworks and programming frameworks.
                                            It is easier for me to keep up with new technologies in projects
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <ul class="mb-resp-15">
                                                    <li>Full Responsive Design</li>
                                                    <li>Modern Browser Compatible</li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6  col-sm-6">
                                                <ul>
                                                    <li>Clean & Quality Code</li>
                                                    <li>7/24 Customer Support</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-3 col-lg-4 mx-auto col-sm-6 skills-item-resp">
                                                <div class="skills-item">
                                                    <div class="skills-item-text">
                                                        <h5>Design</h5>
                                                    </div>
                                                    <div class="body">
                                                        <h2 class="counter">80</h2>
                                                        <div class="skills-progress-bar">
                                                            <div class="skills-progress-value slideInLeft wow"
                                                                data-percent="80"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3 mx-auto col-lg-4 skills-item-resp">
                                                <div class="skills-item">
                                                    <div class="skills-item-text">
                                                        <h5>Coding</h5>
                                                    </div>
                                                    <div class="body">
                                                        <h2 class="counter">90</h2>
                                                        <div class="skills-progress-bar">
                                                            <div class="skills-progress-value slideInLeft wow"
                                                                data-percent="90"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Skills Section End //-->

            <!--// My Works Start //-->
            @if ($section_arr['portfolio_section'] == 1)
                @if (isset($portfolio_section) || count($portfolios) > 0)
                    <section class="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
                        <div class="container">
                            <div class="row">
                                @isset($portfolio_section)
                                    <div class="col-md-6">
                                        <div class="section-heading-left">
                                            <span>{{ $portfolio_section->section_title }}</span>
                                            <h2>{{ $portfolio_section->title }}</h2>
                                        </div>
                                    </div>
                                @endisset
                                <div class="col-md-6">
                                    <div class="portfolio-filter">
                                        <a href="#" data-portfolio-filter="*"
                                            class="current">{{ __('frontend.all') }}</a>
                                        @foreach ($portfolio_categories as $portfolio_category)
                                            <a href="#"
                                                data-portfolio-filter=".{{ $portfolio_category->portfolio_category_slug }}">{{ $portfolio_category->category_name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                @foreach ($portfolios as $portfolio)
                                    <div
                                        class="col-md-6 col-lg-4 portfolio-item {{ $portfolio->portfolio_category->portfolio_category_slug }}">
                                        <div class="portfolio-item-inner">
                                            @if ($portfolio->image_status == 1 && !empty($portfolio->thumbnail_image))
                                                <div class="portfolio-item-img">
                                                    <img src="{{ asset('uploads/img/portfolio/' . $portfolio->thumbnail_image) }}"
                                                        alt="Portfolio image" class="img-fluid">
                                                    <a href="{{ asset('uploads/img/portfolio/' . $portfolio->thumbnail_image) }}"
                                                        class="portfolio-zoom-link">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="body">
                                                <div class="portfolio-details">
                                                    <span>{{ $portfolio->portfolio_category->category_name }}</span>
                                                    <h5>{{ $portfolio->title }}</h5>
                                                </div>
                                                <a href="{{ route('portfolio-page.show', ['portfolio_slug' => $portfolio->portfolio_slug]) }}"
                                                    class="portfolio-link">
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="call-to-action">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="call-to-action-inner">
                                            <h2>{{ __('frontend.do_you_need_a_new_project') }}</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="call-to-action-btn">
                                            <a href="#" data-scroll-nav="7" class="white-btn">
                                                <span class="text">{{ __('frontend.get_in_touch') }}</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-0 bg-primary-light" id="porfolio" data-scroll-index="4">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span class="ourworks-span">Works</span>
                                        <h2 class="p-h2">Our Works</h2>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="portfolio-filter">
                                        <a href="#" data-portfolio-filter="*" class="current">All</a>
                                        <a href="#" data-portfolio-filter=".mockup">Mockup</a>
                                        <a href="#" data-portfolio-filter=".ui">UI/UX</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Card Mockup</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Mockup Box</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Coffee Mockup</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Square Box</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item ui">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Ui Design</span>
                                                <h5>Paper Design</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 portfolio-item mockup">
                                    <div class="portfolio-item-inner">
                                        <div class="portfolio-item-img">
                                            <img src="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                alt="Portfolio image" class="img-fluid">
                                            <a href="{{ asset('uploads/img/dummy/600x600.jpg') }}"
                                                class="portfolio-zoom-link">
                                                <i class="fas fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="body">
                                            <div class="portfolio-details">
                                                <span>Mockup</span>
                                                <h5>Business Card</h5>
                                            </div>
                                            <a href="#" class="portfolio-link">
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="call-to-action">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="call-to-action-inner">
                                            <h2>Dou you need a new project ?</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="call-to-action-btn">
                                            <a href="#" data-scroll-nav="7" class="white-btn">
                                                <span class="text">Contact Me</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// My Works End //-->

            <!--// Team Section Start //-->
            @if ($section_arr['team_section'] == 1)
                @if (isset($team_section) || count($teams) > 0)
                    <section class="section" id="team">
                        <div class="container">
                            @isset($team_section)
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>{{ $team_section->section_title }}</span>
                                            <h2>{{ $team_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="row">
                                @foreach ($teams as $team)
                                    <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s"
                                        data-wow-delay="0.{{ $loop->index + 1 }}s">
                                        <div class="team-card">
                                            @if (!empty($team->team_image))
                                                <div class="img">
                                                    <img src="{{ asset('uploads/img/teams/' . $team->team_image) }}"
                                                        alt="Team image">
                                                </div>
                                            @endif
                                            <div class="body shadow">
                                                <div class="text">
                                                    @if (!empty($team->name))
                                                        <h5>{{ $team->name }}</h5>
                                                    @endif
                                                    @if (!empty($team->job))
                                                        <p>{{ $team->job }}</p>
                                                    @endif
                                                </div>
                                                <div class="social">
                                                    <ul>
                                                        @if (!empty($team->link_2))
                                                            <li><a href="{{ $team->link_2 }}"><i
                                                                        class="fab fa-facebook-f"></i></a></li>
                                                        @endif
                                                        @if (!empty($team->link_3))
                                                            <li><a href="{{ $team->link_3 }}"><i
                                                                        class="fab fa-twitter"></i></a></li>
                                                        @endif
                                                        @if (!empty($team->link_4))
                                                            <li><a href="{{ $team->link_4 }}"><i
                                                                        class="fab fa-instagram"></i></a></li>
                                                        @endif
                                                        @if (!empty($team->link_5))
                                                            <li><a href="{{ $team->link_5 }}"><i
                                                                        class="fab fa-linkedin"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section" id="team">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>Team</span>
                                        <h2>Our Team</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s"
                                    data-wow-delay="0.1s">
                                    <div class="team-card">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}"
                                                alt="Team image">
                                        </div>
                                        <div class="body shadow">
                                            <div class="text">
                                                <h5>George Avenue</h5>
                                                <p>Web Designer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s"
                                    data-wow-delay="0.2s">
                                    <div class="team-card">
                                        <div class="img shadow">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}"
                                                alt="Team image">
                                        </div>
                                        <div class="body shadow">
                                            <div class="text">
                                                <h5>Dominick A. Gray</h5>
                                                <p>App Developer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 wow fadeInDown" data-wow-duration="0.7s"
                                    data-wow-delay="0.3s">
                                    <div class="team-card">
                                        <div class="img shadow">
                                            <img src="{{ asset('uploads/img/dummy/200x200.jpg') }}"
                                                alt="Team image">
                                        </div>
                                        <div class="body">
                                            <div class="text">
                                                <h5>Michael L. Lloyd</h5>
                                                <p>UI Designer</p>
                                            </div>
                                            <div class="social">
                                                <ul>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)"><i
                                                                class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Team Section End //-->

            <!--// Testimonial Section Start //-->
            @if ($section_arr['client_section'] == 1)
                @if (isset($testimonial_section) || count($testimonials) > 0)
                    <section class="section pb-minus-76 bg-primary-light">
                        <div class="container">
                            @isset($testimonial_section)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="section-heading-left">
                                            <span>{{ $testimonial_section->section_title }}</span>
                                            <h2>{{ $testimonial_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="owl-carousel owl-theme" id="testimonialCarousel">
                                @foreach ($testimonials as $testimonial)
                                    <div class="item">
                                        <div class="testimonial-item">
                                            @if ($testimonial->image_status == 1 && !empty($testimonial->testimonial_image))
                                                <div class="img">
                                                    <img src="{{ asset('uploads/img/testimonials/' . $testimonial->testimonial_image) }}"
                                                        alt="Testimonial image" class="img-fluid">
                                                </div>
                                            @endif
                                            <div class="body">
                                                <h5>{{ $testimonial->name }}</h5>
                                                <span>{{ $testimonial->job }}</span>
                                                <p>{{ $testimonial->desc }}</p>
                                                <div class="rating">
                                                    @for ($i = 0; $i <= 5; $i++)
                                                        @if ($i < 3)
                                                            @for ($i = 0; $i < $testimonial->star; $i++)
                                                                <i class="fa fa-star"></i>
                                                            @endfor
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <span class="quote-icon">
                                                <i class="fas fa-quote-right"></i>
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-minus-76 bg-primary-light">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>Testimonial</span>
                                        <h2>Our Clients</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-carousel owl-theme" id="testimonialCarousel">
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}"
                                                alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Jeff N. Hood</h5>
                                            <span>Envato Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}"
                                                alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>James E. Nelson</h5>
                                            <span>Envato Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}"
                                                alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Wallace Chuck</h5>
                                            <span>Envato Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimonial-item">
                                        <div class="img">
                                            <img src="{{ asset('uploads/img/dummy/100x100.jpg') }}"
                                                alt="Testimonial image" class="img-fluid">
                                        </div>
                                        <div class="body">
                                            <h5>Nitin Khajotia</h5>
                                            <span>Envato Customer</span>
                                            <p>
                                                It is a long established fact that a reader will be distracted
                                                by the readable content of a page when looking at its layout.
                                            </p>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <span class="quote-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Testimonial Section End //-->

            <!--// Blog Section Start //-->
            @if ($section_arr['blog_section'] == 1)
                @if (isset($blog_section) || count($recent_posts) > 0)
                    <section class="section pb-minus-76" id="blog">
                        <div class="container">
                            @isset($blog_section)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="section-heading-left">
                                            <span>{{ $blog_section->section_title }}</span>
                                            <h2>{{ $blog_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="owl-carousel owl-theme" id="blogCarousel">
                                @foreach ($recent_posts as $recent_post)
                                    <div class="item">
                                        <div class="blog-item">
                                            @if (!empty($recent_post->blog_image))
                                                <div class="blog-img">
                                                    <a
                                                        href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                        <img src="{{ asset('uploads/img/blogs/' . $recent_post->blog_image) }}"
                                                            alt="Blog image" class="img-fluid">
                                                    </a>
                                                </div>
                                            @else
                                                <div class="blog-img">
                                                    <a
                                                        href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}"
                                                            alt="Blog image" class="img-fluid">
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="blog-body">
                                                <div class="blog-meta">
                                                    <a href="#"><span><i class="far fa-user"></i>
                                                            @if ($recent_post->type == 'with_this_account')
                                                                {{ $recent_post->author_name }}
                                                            @else
                                                                {{ __('frontend.anonymous') }}
                                                            @endif
                                                        </span></a>
                                                    <a href="#"><span><i
                                                                class="far fa-bookmark"></i>{{ $recent_post->category_name }}</span></a>
                                                </div>
                                                <h5>
                                                    <a
                                                        href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">{{ $recent_post->title }}</a>
                                                </h5>
                                                @if (!empty($recent_post->short_desc))
                                                    <p>{{ $recent_post->short_desc }}</p>
                                                @endif
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}"
                                                    class="blog-link">
                                                    {{ __('frontend.read_more') }}
                                                    <i class="fa fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section pb-minus-76" id="blog">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="section-heading-left">
                                        <span>Blogs</span>
                                        <h2>Our Blogs</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-carousel owl-theme" id="blogCarousel">
                                <div class="item">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}"
                                                    alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-meta">
                                                <a href="#"><span><i class="far fa-user"></i>By
                                                        Admin</span></a>
                                                <a href="#"><span><i
                                                            class="far fa-bookmark"></i>Design</span></a>
                                            </div>
                                            <h5>
                                                <a href="#">
                                                    How To Create A Design Brief
                                                </a>
                                            </h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted [..]
                                            </p>
                                            <a href="#" class="blog-link">
                                                Read More
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}"
                                                    alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-meta">
                                                <a href="#"><span><i class="far fa-user"></i>By
                                                        Admin</span></a>
                                                <a href="#"><span><i
                                                            class="far fa-bookmark"></i>Design</span></a>
                                            </div>
                                            <h5>
                                                <a href="#">
                                                    Work On The Latest UI Design Models
                                                </a>
                                            </h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted [..]
                                            </p>
                                            <a href="#" class="blog-link">
                                                Read More
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}"
                                                    alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-meta">
                                                <a href="#"><span><i class="far fa-user"></i>By
                                                        Admin</span></a>
                                                <a href="#"><span><i
                                                            class="far fa-bookmark"></i>Design</span></a>
                                            </div>
                                            <h5>
                                                <a href="#">
                                                    The Golden Rule Between Unique Design
                                                </a>
                                            </h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted [..]
                                            </p>
                                            <a href="#" class="blog-link">
                                                Read More
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog-item">
                                        <div class="blog-img">
                                            <a href="#">
                                                <img src="{{ asset('uploads/img/dummy/600x400.jpg') }}"
                                                    alt="Blog image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-body">
                                            <div class="blog-meta">
                                                <a href="#"><span><i class="far fa-user"></i>By
                                                        Admin</span></a>
                                                <a href="#"><span><i
                                                            class="far fa-bookmark"></i>Wordpress</span></a>
                                            </div>
                                            <h5>
                                                <a href="#">
                                                    How to set up a Wordpress website ?
                                                </a>
                                            </h5>
                                            <p>
                                                It is a long established fact that a reader will be distracted [..]
                                            </p>
                                            <a href="#" class="blog-link">
                                                Read More
                                                <i class="fa fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
            @endif
            <!--// Blog Section End //-->

            @if ($section_arr['contact_section'] == 1)
                <!--// Contact Section Start //-->
                @if (isset($contact_section) || count($contacts) > 0)
                    <section class="section bg-primary-light" id="contact" data-scroll-index="7">
                        <div class="container">
                            @isset($contact_section)
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="section-heading">
                                            <span>{{ $contact_section->section_title }}</span>
                                            <h2>{{ $contact_section->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="row">
                                @foreach ($contacts as $contact)
                                    <div class="col-lg-6">
                                        <div class="contact-info-item">
                                            @if (!empty($contact->icon))
                                                <div class="icon">
                                                    <span class="{{ $contact->icon }}"></span>
                                                </div>
                                            @endif
                                            <div class="body">
                                                @if (!empty($contact->title))
                                                    <h5>{{ $contact->title }}</h5>
                                                @endif
                                                @if (!empty($contact->desc))
                                                    <p>{{ $contact->desc }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap">
                                        <form action="{{ route('message.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="contact-form-group">
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="{{ __('frontend.name') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-form-group">
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="{{ __('frontend.email') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="contact-form-group">
                                                        <input type="text" class="form-control" name="subject"
                                                            placeholder="{{ __('frontend.subject') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="contact-form-group">
                                                        <textarea name="message" class="form-control" cols="20" rows="8"
                                                            placeholder="{{ __('frontend.message') }}" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <div class="contact-btn-left">
                                                        <button type="submit" class="primary-btn">
                                                            <span
                                                                class="text">{{ __('frontend.send_message') }}</span>
                                                            <span class="icon"><i
                                                                    class="fa fa-arrow-right"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <section class="section bg-primary-light" id="contact" data-scroll-index="7">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="section-heading">
                                        <span>Contact Me</span>
                                        <h2>Contact Us</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <span class="fa fa-map-marker-alt"></span>
                                        </div>
                                        <div class="body">
                                            <h5>Address</h5>
                                            <p>1395 Nixon Avenue Etowah, TN 37331
                                                <br>
                                                United States
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <span class="fas fa-envelope-open-text"></span>
                                        </div>
                                        <div class="body">
                                            <h5>E-Mail Phone:</h5>
                                            <p>filaous@example.com</p>
                                            <p>+1 422-200-5555</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="contact-form-wrap">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="contact-form-group">
                                                        <input type="text" class="form-control"
                                                            name="contact_name" id="contactName"
                                                            placeholder="Your Name *">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-form-group">
                                                        <input type="text" class="form-control" name="subject"
                                                            id="contactPhone" placeholder="Subject">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="contact-form-group">
                                                        <input type="text" class="form-control"
                                                            name="contact_email" id="contactEmail"
                                                            placeholder="Your Email *">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="contact-form-group">
                                                        <textarea name="contact_message" id="contactMessage" class="form-control" placeholder="Your Message *"
                                                            cols="20" rows="8"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <div class="contact-btn-left">
                                                        <button type="submit" id="contactBtn"
                                                            class="primary-btn">
                                                            <span class="text">Send Message</span>
                                                            <span class="icon"><i
                                                                    class="fa fa-arrow-right"></i></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!--// Contact Section End //-->

                <!--//Google Map Section Start //-->
                @if (!empty($contact_section->map_iframe))
                    <div class="google-map">
                        <iframe src="{{ $contact_section->map_iframe }}" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                @endif
                <!--// Google Map Section End //-->
            @endif

            <!--// Footer Start //-->
            @if ($section_arr['footer_section'] == 1)
                @if (count($socials) > 0 || isset($site_info) || count($footer_pages) > 0)
                    <footer class="footer">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h6 class="footer-title">{{ __('frontend.about_us') }}</h6>
                                            @if (!empty($general_site_image->site_colored_logo_image))
                                                <img src="{{ asset('uploads/img/general/' . $general_site_image->site_white_logo_image) }}"
                                                    alt="footer logo" class="img-fluid footer-logo">
                                            @endif
                                            @if (!empty($site_info->short_desc))
                                                <p class="footer-desc">{{ $site_info->short_desc }}</p>
                                            @endif
                                            <div class="footer-social-links">
                                                @foreach ($socials as $social)
                                                    <a
                                                        href="@if (!empty($social->link)) {{ $social->link }} @else # @endif">
                                                        <i class="{{ $social->social_media }}"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget footer-widget-pl">
                                            <h6 class="footer-title">{{ __('frontend.customer_relationship') }}</h6>
                                            <ul class="footer-links">
                                                @foreach ($footer_pages as $footer_page)
                                                    <li>
                                                        <a
                                                            href="{{ route('any-page.show', ['page_slug' => $footer_page->page_slug]) }}">{{ $footer_page->page_title }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h6 class="footer-title">Contact Info</h6>
                                            <div class="footer-contact-info-wrap">
                                                <ul class="footer-contact-info-list">
                                                    @if (!empty($site_info->address))
                                                        <li>
                                                            <h6>{{ __('frontend.address') }}</h6>
                                                            <p>{{ $site_info->address }}</p>
                                                        </li>
                                                    @endif
                                                    @if (!empty($site_info->address_map_link))
                                                        <li>
                                                            <h6>{{ __('frontend.address_map_link') }}</h6>
                                                            <a href="{{ $site_info->address_map_link }}"
                                                                target="_blank"
                                                                class="text-white">{{ __('frontend.address_map_link') }}</a>
                                                        </li>
                                                    @endif
                                                    @if (!empty($site_info->email) || !empty($site_info->phone))
                                                        <li>
                                                            <h6>{{ __('frontend.email_and_phone') }}</h6>
                                                            <div class="text">
                                                                @if (!empty($site_info->phone))
                                                                    <p>{{ $site_info->phone }}</p>
                                                                @endif
                                                                @if (!empty($site_info->email))
                                                                    <p>{{ $site_info->email }}</p>
                                                                @endif
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (!empty($site_info->copyright))
                            <div class="copyright">
                                <div class="container">
                                    <p class="copyright-text">{{ $site_info->copyright }}</p>
                                </div>
                            </div>
                        @endif
                    </footer>
                @else
                    <footer class="footer">
                        <div class="footer-top">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h6 class="footer-title">About Us</h6>
                                            <img src="{{ asset('uploads/img/dummy/white-logo.png') }}"
                                                alt="footer logo" class="img-fluid footer-logo">
                                            <p class="footer-desc">
                                                It is a long established fact that a reader will be
                                                distracted by the readable content..
                                            </p>
                                            <div class="footer-social-links">
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                                <a href="javascript:void(0)">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget footer-widget-pl">
                                            <h6 class="footer-title">Customer relationship</h6>
                                            <ul class="footer-links">
                                                <li>
                                                    <a href="javascript:void(0)">Delivery and Returns</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Product review</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">User agreement</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Privacy Policy</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Distance Selling Agreement</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)">Frequently Asked Questions</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 footer-widget-resp">
                                        <div class="footer-widget">
                                            <h6 class="footer-title">Contact Info</h6>
                                            <div class="footer-contact-info-wrap">
                                                <ul class="footer-contact-info-list">
                                                    <li>
                                                        <h6>Address:</h6>
                                                        <p>
                                                            1395 Nixon Avenue Etowah, TN 37331
                                                            <br>United States
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <h6>E-Mail & Phone:</h6>
                                                        <div class="text">
                                                            <p>+1 422-200-5555</p>
                                                            <p>digitalteam@example.com</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="copyright">
                            <div class="container">
                                <p class="copyright-text">© Copyright 2021. Powered By ElseColor</p>
                            </div>
                        </div>
                    </footer>
                @endif
            @endif
            <!--// Footer End //-->
        </main>
        <!--// Main Area End //-->

        @if (isset($quick_access_button))

            @if ($quick_access_button->status == 1 && $quick_access_button->status_phone == 1)

                @if ($quick_access_button->contact == 'fas fa-envelope')
                    <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="scroll-phone-btn">
                        <i class="{{ $quick_access_button->contact }}"></i>
                    </a>
                @else
                    <a href="tel:{{ $quick_access_button->email_or_phone }}" class="scroll-phone-btn">
                        <i class="{{ $quick_access_button->contact }}"></i>
                    </a>
                @endif
                <!--// .scroll-phone-btn // -->

                <a href="{{ $quick_access_button->link }}" class="scroll-facebook-btn">
                    <i class="{{ $quick_access_button->social_media }}"></i>
                </a>
                <!--// .scroll-facebook-btn // -->
            @elseif ($quick_access_button->status == 1 && $quick_access_button->status_phone == 0)
                <a href="{{ $quick_access_button->link }}" class="scroll-phone-btn">
                    <i class="{{ $quick_access_button->social_media }}"></i>
                </a>
                <!--// .scroll-phone-btn // -->
            @elseif ($quick_access_button->status == 0 && $quick_access_button->status_phone == 1)
                @if ($quick_access_button->contact == 'fas fa-envelope')
                    <a href="mailto:{{ $quick_access_button->email_or_phone }}" class="scroll-phone-btn">
                        <i class="{{ $quick_access_button->contact }}"></i>
                    </a>
                @else
                    <a href="tel:{{ $quick_access_button->email_or_phone }}" class="scroll-phone-btn">
                        <i class="{{ $quick_access_button->contact }}"></i>
                    </a>
                @endif
                <!--// .scroll-phone-btn // -->
            @endif

        @endif

        @if ($section_arr['scroll_top_btn'] == 1)
            <a href="#" class="scroll-top-btn" data-scroll-goto="1">
                <i class="fa fa-arrow-up"></i>
            </a>
        @endif
        <!--// .scroll-top-btn // -->

        @if ($section_arr['preloader'] == 1)
            <div id="preloader-wrap">
                <div class="preloader-inner">
                    <div class="lds-roller">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        @endif
        <!--// Preloader // -->

    </div>
    <!--// Page Wrapper End //-->


    @if ($section_arr['color_option_sidebar'] == 1)
        <div id="colorOptionsSidebar">
            <div class="color-options-wrap">
                <button type="button" id="colorOptionsSidebarToggle">
                    <i class="fa fa-cog fa-spin"></i>
                </button>
                <div class="color-options-list">
                    <span class="color-options-item default"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/default-color.css') }}"></span>
                    <span class="color-options-item blue"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/blue-color.css') }}"></span>
                    <span class="color-options-item red"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/red-color.css') }}"></span>
                    <span class="color-options-item yellow"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/yellow-color.css') }}"></span>
                    <span class="color-options-item green"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/green-color.css') }}"></span>
                    <span class="color-options-item pink"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/pink-color.css') }}"></span>
                    <span class="color-options-item turquose"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/turquose-color.css') }}"></span>
                    <span class="color-options-item purple"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/purple-color.css') }}"></span>
                    <span class="color-options-item blue2"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/blue-color-2.css') }}"></span>
                    <span class="color-options-item orange"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/orange-color.css') }}"></span>
                    <span class="color-options-item magenta"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/magenta-color.css') }}"></span>
                    <span class="color-options-item orange2"
                        data-skins-css-path="{{ asset('assets/frontend/css/skins/orange-color-2.css') }}"></span>
                </div>
            </div>
        </div>
    @endif
    <!--// #colorOptionsSidebar //-->

    @if ($section_arr['rtl_sidebar'] == 1)
        <div id="rtlSidebar">
            <button type="button" id="rtlToggle">RTL</button>
        </div>
    @endif
    <!--// #rtlSidebar //-->

    <!--// JQuery //-->
    <script src="{{ asset('assets/frontend/vendor/js/jquery.min.js') }}"></script>
    <!--// Popper //-->
    <script src="{{ asset('assets/frontend/vendor/js/popper.min.js') }}"></script>
    <!--// Bootstrap //-->
    <script src="{{ asset('assets/frontend/vendor/js/bootstrap.min.js') }}"></script>
    <!--// Images Loaded Js //-->
    <script src="{{ asset('assets/frontend/vendor/js/images.loaded.min.js') }}"></script>
    <!--// Wow Js //-->
    <script src="{{ asset('assets/frontend/vendor/js/wow.min.js') }}"></script>
    <!--// Magnific Popup //-->
    <script src="{{ asset('assets/frontend/vendor/js/magnific.popup.min.js') }}"></script>
    <!--// Waypoint Js //-->
    <script src="{{ asset('assets/frontend/vendor/js/waypoint.min.js') }}"></script>
    <!--// Counter Up Js //-->
    <script src="{{ asset('assets/frontend/vendor/js/counter.up.min.js') }}"></script>
    <!--// JQuery Easing Functions //-->
    <script src="{{ asset('assets/frontend/vendor/js/jquery.easing.min.js') }}"></script>
    <!--// Owl Carousel //-->
    <script src="{{ asset('assets/frontend/vendor/js/owl.carousel.min.js') }}"></script>
    <!--// Form Validate //-->
    <script src="{{ asset('assets/frontend/vendor/js/validate.min.js') }}"></script>
    <!--// Form Validate //-->
    <script src="{{ asset('assets/frontend/vendor/js/custom.select.plugin.js') }}"></script>
    <!--// Scroll It //-->
    <script src="{{ asset('assets/frontend/vendor/js/scrollit.min.js') }}"></script>
    <!--// Isotope Js //-->
    <script src="{{ asset('assets/frontend/vendor/js/isotope.min.js') }}"></script>


    @if ($homepage_version->choose_version == 1 || session()->get('choose_version') == 1)
        <!--// Particles Js //-->
        <script src="{{ asset('assets/frontend/vendor/js/particles.js') }}"></script>
    @endif

    @if ($homepage_version->choose_version == 2 || session()->get('choose_version') == 2)
        <!--// Zepto //-->
        <script src="{{ asset('assets/frontend/vendor/js/zepto.min.js') }}"></script>
        <!--// Vegas Slider //-->
        <script src="{{ asset('assets/frontend/vendor/js/vegas.slider.min.js') }}"></script>
    @endif

    @if ($homepage_version->choose_version == 3 || session()->get('choose_version') == 3)
        <!--// MB Youtube Player //-->
        <script src="{{ asset('assets/frontend/vendor/js/jquery.mb-ytb.min.js') }}"></script>
    @endif

    <!--// Main Js //-->
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

    @if (session()->has('language_direction_from_dropdown'))

        @if (session()->get('language_direction_from_dropdown') == 1)

            <!-- Theme Main Js  -->
            <script src="{{ asset('assets/frontend/js/rtl-mode.js') }}"></script>

        @endif
    @elseif (isset($language))
        @if ($language->direction == 1)

            <!-- Theme Main Js  -->
            <script src="{{ asset('assets/frontend/js/rtl-mode.js') }}"></script>

        @endif

    @endif

    <!-- Vegas Slider  -->
    @if ($homepage_version->choose_version == 2 || session()->get('choose_version') == 2)
        @if (count($sliders) > 0)

            <script>
                jQuery(document).ready(function() {
                    jQuery("#heroSliderContainer").vegas({
                        slides: [
                            @foreach ($sliders as $slider)

                                @if (count($sliders) == 1)

                                    {
                                        src: "{{ asset('uploads/img/sliders/' . $slider->slider_image) }}"
                                    }, {
                                        src: "{{ asset('uploads/img/sliders/' . $slider->slider_image) }}"
                                    },
                                @endif

                                {
                                    src: "{{ asset('uploads/img/sliders/' . $slider->slider_image) }}"
                                },
                            @endforeach
                        ],
                        overlay: true,
                        transition: 'fade2',
                        animation: 'kenburnsUpLeft'
                    });
                });
            </script>
        @else
            <script>
                jQuery(document).ready(function() {
                    jQuery("#heroSliderContainer").vegas({
                        slides: [

                            {
                                src: "{{ asset('uploads/img/dummy/1920x1080.jpg') }}"
                            },

                            {
                                src: "{{ asset('uploads/img/dummy/1920x1080.jpg') }}"
                            },

                        ],
                        overlay: true,
                        transition: 'fade2',
                        animation: 'kenburnsUpLeft'
                    });
                });
            </script>

        @endif
    @endif


</body>

</html>
