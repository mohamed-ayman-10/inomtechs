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
    <meta name="title"
        content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description"
        content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords"
        content="@if (isset($blog)) {{ $blog->meta_keyword }} @elseif (isset($service)) {{ $service->meta_keyword }} @elseif (isset($portfolio)) {{ $portfolio->meta_keyword }} @elseif (isset($general_seo)){{ $general_seo->site_keywords }} @endif ">
    <meta name="author" content="elsecolor">
    <meta property="fb:app_id" content="@if (isset($general_seo)) {{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title"
        content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:description"
        content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image"
        content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/' . $blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/' . $service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta itemprop="image"
        content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/' . $blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/' . $service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
        content="@if (!empty($blog->blog_image)) {{ asset('uploads/img/blogs/thumbnail/' . $blog->blog_image) }} @elseif (!empty($service->service_image)) {{ asset('uploads/img/service/' . $service->service_image) }} @elseif (!empty($portfolio->thumbnail_image)) @elseif (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/' . $general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title"
        content="@if (isset($blog)) {{ $blog->title }} @elseif (isset($service)) {{ $service->title }} @elseif (isset($portfolio->title)) {{ $portfolio->title }} @elseif (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description"
        content="@if (isset($blog)) {{ $blog->meta_desc }} @elseif (isset($service)) {{ $service->meta_desc }} @elseif (isset($portfolio)) {{ $portfolio->meta_desc }} @elseif (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>
        @if (isset($general_seo)){{ $general_seo->site_name }} @endif
        @if (isset($blog)) {{ $blog->title }}
        @elseif (isset($service))
            {{ $service->title }}
        @elseif (isset($portfolio->title))
            {{ $portfolio->title }}
        @elseif (isset($general_seo))
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

    <!--// Bootstrap  //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/bootstrap.min.css') }}">
    <!--// Magnific Popup //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/magnific.popup.min.css') }}">
    <!--// Animate Css //-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/css/animate.min.css') }}">
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
                                    <a class="nav-link menu-link"
                                        href="{{ url('/') }}">{{ __('frontend.back_to_home') }}</a>
                                </li>
                                @if (count($display_dropdowns) > 0)
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="pageDropdownMenu"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            @if (session()->has('language_name_from_dropdown'))
                                                {{ session()->get('language_name_from_dropdown') }}
                                            @else
                                                {{ $language->language_name }} @endif
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

            @yield('content')

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

    </div>
    <!--// Page Wrapper End //-->


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

</body>

</html>
