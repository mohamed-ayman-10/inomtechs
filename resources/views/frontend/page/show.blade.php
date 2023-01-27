@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}"
             @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ $page->page_title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $page->page_title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Services Section Start //-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Include Alert Blade -->
                    @include('frontend.alert.alert-subscribe')
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-detail-inner">
                        <p>@php echo html_entity_decode($page->desc); @endphp</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="widget-sidebar">
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                            <ul class="sidebar-share clearfix">
                                <li>
                                    <a href="{{$page->getShareUrl('twitter')}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$page->getShareUrl('whatsapp')}}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$page->getShareUrl('pinterest')}}" target="_blank">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widgets">
                            <div class="subscribe-newsletter">
                                <div class="subscribe-newsletter-text">
                                    <div class="icon">
                                        <span class="fa fa-envelope-open-text"></span>
                                    </div>
                                    <h5>{{ __('frontend.subscribe_newsletter') }}</h5>
                                    <p>{{ __('frontend.get_the_latest_news') }}</p>
                                    <form action="{{ route('subscribe-section.store') }}" method="POST">
                                        @csrf
                                        <div class="form-newsletter">
                                            <input type="text" name="email" placeholder="{{ __('frontend.enter_email') }}" required>
                                            <button><i class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Services Section End //-->

@endsection
