@extends('layouts.frontend.master')

@section('content')

    <!--Page Title-->
    <section class="page-banner">
        <div class="image-layer" style="@if (isset($breadcrumb)) background-image: url('{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}');
        @else background-image: url('{{ asset('uploads/img/dummy/1920x350.jpg') }}');
        @endif"></div>

        <div class="banner-inner">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <h1>{{ __('frontend.about_us') }}</h1>
                    <div class="page-nav">
                        <ul class="bread-crumb clearfix">
                            <li><a href="{{ url('/') }}">{{ __('frontend.home') }}</a></li>
                            <li class="active">{{ __('frontend.about_us') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Welcome Section-->
    @isset ($welcome)
        <section class="welcome-section-two alternate">
            <div class="lower-row">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="text-col @if ($welcome->image_status == 1) col-xl-5 col-lg-6 @else col-lg-12 @endif col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="sec-title with-separator">
                                    <h2>{{ $welcome->title }}</h2>
                                    <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                </div>
                                @if (!empty($welcome->desc)) <div class="text">{{ $welcome->desc }}</div> @endif
                                @if (!empty($welcome->company_or_person_name) || !empty($welcome->designation))
                                    <div class="info">
                                        <strong>{{ $welcome->company_or_person_name }}</strong>
                                        <span class="designation">{{ $welcome->designation }}</span>
                                    </div>
                                @endif
                               @if (!empty($welcome->video_link_desc))
                                    <div class="video-link">
                                        <a href="@if (!empty($welcome->video_link)) {{ $welcome->video_link }} @else # @endif" class="link lightbox-image"><span class="icon flaticon-play-button-4"></span><span class="txt">{{ $welcome->video_link_desc }}</span></a>
                                    </div>
                                   @endif
                            </div>
                        </div>

                       @if ($welcome->image_status == 1)
                            <div class="image-col col-xl-7 col-lg-6 col-md-12 col-sm-12">
                                <div class="images">
                                    <div class="row clearfix">
                                        @if (!empty($welcome->image_1))
                                            <div class="image col-md-6 col-sm-12">
                                                <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/welcome/'.$welcome->image_1) }}"><img src="{{ asset('uploads/img/welcome/'.$welcome->image_1) }}" alt="about image"></a>
                                            </div>
                                        @endif
                                        @if (!empty($welcome->image_2))
                                            <div class="image col-md-6 col-sm-12">
                                                <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/welcome/'.$welcome->image_2) }}"><img src="{{ asset('uploads/img/welcome/'.$welcome->image_2) }}" alt="about image"></a>
                                            </div>
                                        @endif
                                        @if (!empty($welcome->image_3))
                                            <div class="image col-md-4 col-sm-12">
                                                <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/welcome/'.$welcome->image_3) }}"><img src="{{ asset('uploads/img/welcome/'.$welcome->image_3) }}" alt="about image"></a>
                                            </div>
                                        @endif
                                        @if (!empty($welcome->image_4))
                                            <div class="image col-md-4 col-sm-12">
                                                <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/welcome/'.$welcome->image_4) }}"><img src="{{ asset('uploads/img/welcome/'.$welcome->image_4) }}" alt="about image"></a>
                                            </div>
                                        @endif
                                        @if (!empty($welcome->image_5))
                                            <div class="image col-md-4 col-sm-12">
                                                <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/welcome/'.$welcome->image_5) }}"><img src="{{ asset('uploads/img/welcome/'.$welcome->image_5) }}" alt="about image"></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </section>
    @else
        <section class="welcome-section-two alternate">
            <div class="lower-row">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="text-col col-xl-5 col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                <div class="sec-title with-separator">
                                    <h2>The Major Voice of <br>City Government, London</h2>
                                    <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                                </div>
                                <div class="text">Denounce with righteous indignation and dislike men who are so beguiled & demoralized our power of pleasure is to be welcomed.</div>
                                <div class="info">
                                    <strong>Brendon Garrey</strong>
                                    <span class="designation">mayor, since 21st Oct,2019</span>
                                </div>
                                <div class="video-link">
                                    <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="link lightbox-image"><span class="icon flaticon-play-button-4"></span><span class="txt">History of <br>london city council</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="image-col col-xl-7 col-lg-6 col-md-12 col-sm-12">
                            <div class="images">
                                <div class="row clearfix">
                                    <div class="image col-md-6 col-sm-12">
                                        <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/dummy/330x200.jpg') }}"><img src="{{ asset('uploads/img/dummy/330x200.jpg') }}" alt="about image"></a>
                                    </div>
                                    <div class="image col-md-6 col-sm-12">
                                        <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/dummy/330x200.jpg') }}"><img src="{{ asset('uploads/img/dummy/330x200.jpg') }}" alt="about image"></a>
                                    </div>
                                    <div class="image col-md-4 col-sm-12">
                                        <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/dummy/215x200.jpg') }}"><img src="{{ asset('uploads/img/dummy/330x200.jpg') }}" alt="about image"></a>
                                    </div>
                                    <div class="image col-md-4 col-sm-12">
                                        <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/dummy/215x200.jpg') }}"><img src="{{ asset('uploads/img/dummy/330x200.jpg') }}" alt="about image"></a>
                                    </div>
                                    <div class="image col-md-4 col-sm-12">
                                        <a class="lightbox-image" data-fancybox="about-gallery" href="{{ asset('uploads/img/dummy/215x200.jpg') }}"><img src="{{ asset('uploads/img/dummy/330x200.jpg') }}" alt="about image"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endisset

    <!--Highlights Section-->
    @if (isset($highlight_section) || count($highlights) > 0)
        <section class="highlights-section-two">
            <div class="image-layer" style="@isset ($highlight_section)
            @if ($highlight_section->image_status == 1)background-image:url({{ asset('uploads/img/highlight/'.$highlight_section->bg_image) }}); @endif
            @endisset"></div>
            <div class="auto-container">
                <div class="featured-carousel owl-theme owl-carousel">
                @php $i = 2; @endphp
                @foreach ($highlights as $key => $value)
                          <!--Featured Block -->
                          <div class="featured-block-five">
                              <div class="inner-box">
                                  <div class="count-box"><span>0{{ $i++ }}</span></div>
                                  <div class="content">
                                      @if ($value['type'] == "icon")
                                          @if (!empty($value['icon']))
                                              <div class="icon-box"><span class="{{ $value['icon'] }}"></span></div>
                                          @endif
                                      @else
                                          @if (!empty($value['highlight_image']))
                                              <div class="icon-box image-size-48"><img src="{{ asset('uploads/img/highlight/'.$value['highlight_image']) }}" alt="feature image"></div>
                                          @endif
                                      @endif
                                      <h3><a href="@if (!empty($value['btn_link'])) {{ $value['btn_link'] }} @else # @endif">{{ $value['title'] }}</a></h3>
                                      @if (!empty($value['desc'])) <div class="text">{{ $value['desc'] }}</div> @endif
                                      @if (!empty($value['btn_link'])) <div class="read-more"><a href="{{ $value['btn_link'] }}"><span class="flaticon-right-2"></span></a></div> @endif
                                  </div>
                                  @isset($highlights[$key+1])
                                      <div class="bottom-text">{{ $highlights[$key]->title }}</div>
                                  @endisset
                              </div>
                          </div>
                      @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="highlights-section-two">
            <div class="image-layer" style="background-image:url({{ asset('uploads/img/dummy/1920x580.jpg') }});"></div>
            <div class="auto-container">
                <div class="featured-carousel owl-theme owl-carousel">
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>01</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-promotion-1"></span></div>
                                <h3><a href="#">Jobs at <br>our city govt</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">1. Jobs at our city govt</div>
                        </div>
                    </div>
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>02</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-mall"></span></div>
                                <h3><a href="#">Building <br>and squares</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">2. Building and squares</div>
                        </div>
                    </div>
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>03</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-target"></span></div>
                                <h3><a href="#">Partner <br>organisations</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">3. Partner organisations</div>
                        </div>
                    </div>
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>04</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-promotion-1"></span></div>
                                <h3><a href="#">Jobs at <br>our city govt</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">4. Jobs at our city govt</div>
                        </div>
                    </div>
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>05</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-mall"></span></div>
                                <h3><a href="#">Building <br>and squares</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">5. Building and squares</div>
                        </div>
                    </div>
                    <!--Featured Block -->
                    <div class="featured-block-five">
                        <div class="inner-box">
                            <div class="count-box"><span>06</span></div>
                            <div class="content">
                                <div class="icon-box"><span class="flaticon-target"></span></div>
                                <h3><a href="#">Partner <br>organisations</a></h3>
                                <div class="text">We denounce with righteus dislike indignation and dislike demoralized by teh pleasure moment.</div>
                                <div class="read-more"><a href="#"><span class="flaticon-right-2"></span></a></div>
                            </div>
                            <div class="bottom-text">6. Partner organisations</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--Team Section-->
    @if (isset($manager_section) || count($managers) > 0)
        <section class="team-section alternate">
            <div class="auto-container">
                @isset ($manager_section)
                    <div class="sec-title with-separator centered">
                        <h2>{{ $manager_section->title }}</h2>
                        <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                        <div class="lower-text">{{ $manager_section->desc }}</div>
                    </div>
                    @endisset
                <div class="team-carousel owl-theme owl-carousel">
                    @foreach ($managers as $manager)
                            <!--Team Block-->
                            <div class="team-block">
                                <div class="inner-box">
                                    <div class="image-box">
                                        @if (!empty($manager->manager_image))
                                            <figure class="image"><img src="{{ asset('uploads/img/managers/'.$manager->manager_image) }}" alt="member image"></figure>
                                        @else
                                            <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340-no-image.png') }}" alt="member image"></figure>
                                        @endif
                                        <div class="hover-box">
                                            <div class="hover-inner">
                                                <div class="hover-upper">
                                                    <div class="icon-box"><span class="flaticon-chat"></span></div>
                                                    <h6>Get Touch With Me</h6>
                                                </div>
                                                <div class="hover-lower">
                                                    <ul class="info">
                                                        @if (!empty($manager->phone)) <li><a href="tel:{{ $manager->phone }}">{{ $manager->phone }}</a></li> @endif
                                                        @if (!empty($manager->link_1)) <li><a href="mailto:{{ $manager->link_1 }}">{{ $manager->link_1 }}</a></li> @endif
                                                    </ul>
                                                    <ul class="social-links clearfix">
                                                        @if (!empty($manager->link_2))  <li><a href="@if (!empty($manager->link_2)) @else # @endif"><span class="fab fa-facebook-f"></span></a></li> @endif
                                                        @if (!empty($manager->link_3))  <li><a href="@if (!empty($manager->link_3)) @else # @endif"><span class="fab fa-twitter"></span></a></li> @endif
                                                        @if (!empty($manager->link_4))  <li><a href="@if (!empty($manager->link_4)) @else # @endif"><span class="fab fa-instagram"></span></a></li> @endif
                                                        @if (!empty($manager->link_5))  <li><a href="@if (!empty($manager->link_5)) @else # @endif"><span class="fab fa-linkedin"></span></a></li> @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lower-box">
                                        @if (!empty($manager->name)) <h4><a href="#">{{ $manager->name }}</a></h4> @endif
                                        @if (!empty($manager->job)) <div class="designation">{{ $manager->job }}</div> @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>
        </section>
    @else
        <section class="team-section alternate">
            <div class="auto-container">
                <div class="sec-title with-separator centered">
                    <h2>Meet Council Members</h2>
                    <div class="separator"><span class="cir c-1"></span><span class="cir c-2"></span><span class="cir c-3"></span></div>
                    <div class="lower-text">Denounce with righteous indignation and dislike men who are so beguiled & demoralized our power of choice.</div>
                </div>

                <div class="team-carousel owl-theme owl-carousel">
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Bertram Irvin</a></h4>
                                <div class="designation">Mayor</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Elvina Julie</a></h4>
                                <div class="designation">Actuary</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Herman Gordon</a></h4>
                                <div class="designation">Director</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Marian Lenora</a></h4>
                                <div class="designation">Speaker</div>
                            </div>
                        </div>
                    </div>

                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Bertram Irvin</a></h4>
                                <div class="designation">Mayor</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Elvina Julie</a></h4>
                                <div class="designation">Actuary</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Herman Gordon</a></h4>
                                <div class="designation">Director</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Marian Lenora</a></h4>
                                <div class="designation">Speaker</div>
                            </div>
                        </div>
                    </div>

                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Bertram Irvin</a></h4>
                                <div class="designation">Mayor</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Elvina Julie</a></h4>
                                <div class="designation">Actuary</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Herman Gordon</a></h4>
                                <div class="designation">Director</div>
                            </div>
                        </div>
                    </div>
                    <!--Team Block-->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('uploads/img/dummy/290x340.jpg') }}" alt="team image"></figure>
                                <div class="hover-box">
                                    <div class="hover-inner">
                                        <div class="hover-upper">
                                            <div class="icon-box"><span class="flaticon-chat"></span></div>
                                            <h6>Get Touch With Me</h6>
                                        </div>
                                        <div class="hover-lower">
                                            <ul class="info">
                                                <li><a href="tel:+44-800-123-45">+44 800 123 45</a></li>
                                                <li><a href="mailto:elvina@citygov.com">elvina@citygov.com</a></li>
                                            </ul>
                                            <ul class="social-links clearfix">
                                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h4><a href="#">Marian Lenora</a></h4>
                                <div class="designation">Speaker</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    <!--Extended Info Section-->
    @if (isset($info_section) || count($infos) > 0)
        <section class="ext-info-section">
            <div class="pattern-layer" style="background-image: url({{ asset('uploads/img/dummy/pattern-2.png') }});"></div>
            <div class="awards-row">
                <div class="auto-container">
                    <div class="outer-container">
                        <div class="image-layer"></div>
                        <div class="row clearfix">
                            @foreach ($infos->chunk(2) as $info)
                                <div class="column col-xl-6 col-lg-6 col-md-12">
                                    @foreach ($info as $item)
                                        <div class="award-block">
                                            <div class="inner">
                                                <span class="slash">//////////</span>
                                                <h4><a href="#">{{ $item->title }}</a></h4>
                                                <div class="text">{{ $item->desc }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
           @isset ($info_section)
                <div class="content-row">
                    <div class="auto-container">
                        <div class="content">
                            <h4>{{ $info_section->title }}</h4>
                            <h2>{{ $info_section->desc }}</h2>
                            <div class="link-box">
                                <a href="#" class="theme-btn btn-style-one"><span class="btn-title">{{ __('frontend.contact_us') }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>
               @endisset
        </section>
    @else
        <section class="ext-info-section">
            <div class="pattern-layer" style="background-image: url({{ asset('uploads/img/dummy/pattern-2.png') }});"></div>
            <div class="awards-row">
                <div class="auto-container">
                    <div class="outer-container">
                        <div class="image-layer"></div>
                        <div class="row clearfix">
                            <div class="column col-xl-6 col-lg-6 col-md-12">
                                <div class="award-block">
                                    <div class="inner">
                                        <span class="slash">//////////</span>
                                        <h4><a href="#">City Plantation Award – 1988</a></h4>
                                        <div class="text">Blinded by desire, that they cannot foresee belongs which through shrinking.</div>
                                    </div>
                                </div>
                                <div class="award-block">
                                    <div class="inner">
                                        <span class="slash">//////////</span>
                                        <h4><a href="#">Environment Safety Award – 1995</a></h4>
                                        <div class="text">Trouble that are bound to ensue and equal to those city work who fail their duty.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="column col-xl-6 col-lg-6 col-md-12">
                                <div class="award-block">
                                    <div class="inner">
                                        <span class="slash">//////////</span>
                                        <h4><a href="#">Architectural Heritage Award – 1996</a></h4>
                                        <div class="text">Foresee the pain and trouble that are bound to ensue and equal blame belongs.</div>
                                    </div>
                                </div>
                                <div class="award-block">
                                    <div class="inner">
                                        <span class="slash">//////////</span>
                                        <h4><a href="#">Municipal Projects & Services Award 2001</a></h4>
                                        <div class="text">Our power of choice untrammelled and when nothing prevents what like best. </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-row">
                <div class="auto-container">
                    <div class="content">
                        <h4>Thinking of living in london city?</h4>
                        <h2>Everyone should live in a london city at least once.</h2>
                        <div class="link-box">
                            <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Contact Us</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


@endsection
