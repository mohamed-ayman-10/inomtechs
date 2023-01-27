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
                        <h1>{{ $category->category_name }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $category->category_name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// My Works Start //-->
    @if (count($portfolios) > 0)
        <section class="section bg-primary-light" id="porfolio">
            <div class="container">
                <div class="row portfolio-grid" id="portfolio-masonry-wrap">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-md-6 col-lg-4 portfolio-item {{ $portfolio->portfolio_category->portfolio_category_slug }}">
                            <div class="portfolio-item-inner">
                                @if ($portfolio->image_status == 1 && !empty($portfolio->thumbnail_image))
                                    <div class="portfolio-item-img">
                                        <img src="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" alt="Portfolio image" class="img-fluid">
                                        <a href="{{ asset('uploads/img/portfolio/'.$portfolio->thumbnail_image) }}" class="portfolio-zoom-link">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </div>
                                @endif
                                <div class="body">
                                    <div class="portfolio-details">
                                        <span>{{ $portfolio->portfolio_category->category_name }}</span>
                                        <h5>{{ $portfolio->title }}</h5>
                                    </div>
                                    <a href="{{ route('portfolio-page.show', ['portfolio_slug' => $portfolio->portfolio_slug]) }}" class="portfolio-link">
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
        <section class="section pb-0 bg-primary-light" id="porfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>{{ __('frontend.updating') }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--// My Works End //-->


@endsection