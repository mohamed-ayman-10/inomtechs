@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if ($service->breadcrumb_status == 1 && !empty($service->custom_breadcrumb_image))  data-bg-image-path = "{{ asset('uploads/img/service/breadcrumb/'.$service->custom_breadcrumb_image) }}"
             @elseif (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ $service->title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $service->title }}
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
                <div class="col-lg-8 col-md-12">
                    @if ($service->image_status == "enable")
                        @if (!empty($service->service_image))
                            <div class="services-detail-top">
                                <img src="{{ asset('uploads/img/service/'.$service->service_image) }}" alt="image" class="img-fluid">
                                @if (!empty($service->icon)) <span class="{{ $service->icon }}"></span> @endif
                            </div>
                            @endif
                        @endif
                    <div class="services-detail-inner">
                        <h2>{{ $service->title }}</h2>
                        <p>@php echo html_entity_decode($service->desc); @endphp</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="widget-sidebar">
                        @if (count($details) > 0)
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.service_details') }}</h5>
                                <div class="sidebar-details-list">
                                    <ul>
                                       @foreach ($details as $detail)
                                            <li><h6>{{ $detail->title }}<span>{{ $detail->desc }}</span></h6></li>
                                           @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        @if (count($recent_posts) > 0)
                                <div class="sidebar-widgets">
                                    <h5 class="inner-header-title">{{ __('frontend.recent_posts') }}</h5>
                                    @foreach ($recent_posts as $recent_post)
                                        <div class="recent-post-item clearfix">
                                            <div class="recent-post-img mr-3">
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                    @if (!empty($recent_post->blog_image))
                                                                <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" class="img-fluid image-size-100" alt="blog image">
                                                    @else
                                                        <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" class="img-fluid image-size-100"  alt="blog image">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="recent-post-body">
                                                <a href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                                    <h6 class="recent-post-title">{{ $recent_post->title }}</h6>
                                                </a>
                                                <p class="recent-post-date"><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($recent_post->created_at)->isoFormat('GGGG') }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            @endif
                            <div class="sidebar-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.share') }}</h5>
                                <ul class="sidebar-share clearfix">
                                    <li>
                                        <a href="{{$service->getShareUrl('twitter')}}" target="_blank">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$service->getShareUrl('whatsapp')}}" target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$service->getShareUrl('pinterest')}}" target="_blank">
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
