@extends('layouts.frontend.master')

@section('content')

      <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}";
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ __('frontend.services') }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ __('frontend.services') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Services Section Start //-->
    @if (count($services) > 0)
        <section class="section pb-minus-70" data-scroll-index="3">
            <div class="container">
                @isset ($service_section)
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
                        <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.{{ $loop->index }}s">
                            <div class="services-item">
                                <div class="body">
                                    <h5>{{ $service->title }}</h5>
                                    @if (!empty($service->desc)) <p>{{ $service->des }}</p> @endif
                                    <a href="{{ route('service-page.show', ['service_slug' => $service->service_slug]) }}">Read More <i class="fa fa-arrow-right"></i></a>
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
                    <div class="row">
                        <div class="col-lg-12">
                                {{ $services->links() }}
                            <!--// .pagination-wrap //-->
                        </div>
                    </div>

            </div>
        </section>
    @else
        <section class="section pb-minus-70" data-scroll-index="3">
            <div class="container">
                <div class="row">
                   <div class="col-lg-12">
                       <p>{{ __('frontend.updating') }}</p>
                   </div>
                </div>
            </div>
        </section>
    @endif
    <!--// Services Section End //-->

@endsection
