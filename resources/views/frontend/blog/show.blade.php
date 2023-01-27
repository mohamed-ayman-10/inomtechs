@extends('layouts.frontend.master')

@section('content')

    <!--// Breadcrumb Section Start //-->
    <section class="breadcrumb-section section" data-scroll-index="1" @if ($blog->breadcrumb_status == 1 && !empty($blog->custom_breadcrumb_image))  data-bg-image-path = "{{ asset('uploads/img/blogs/breadcrumb/'.$blog->custom_breadcrumb_image) }}"
             @elseif (isset($breadcrumb)) data-bg-image-path = "{{ asset('uploads/img/general/'.$breadcrumb->breadcrumb_image) }}"
             @else data-bg-image-path="{{ asset('uploads/img/dummy/1920x350.jpg') }}"
            @endif>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-inner">
                        <h1>{{ $blog->title }}</h1>
                        <ul class="breadcrumb-links">
                            <li>
                                <a href="{{ url('/') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="active">
                                {{ $blog->title }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Breadcrumb Section end //-->

    <!--// Blog Sidebar Section Start //-->
    <section class="section padding-minus-90" id="blog-sidebar-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-post-single">
                       @if ($blog->image_status == 1 && !empty($blog->blog_image))
                            <div class="blog-post-img">
                                <img src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" alt="Image" class="img-fluid">
                            </div>
                           @endif
                        <div class="blog-text">
                            <h4>{{ $blog->title }}</h4>
                            <div class="author-meta">
                                <a href="#"><span class="far fa-user"></span>@if ($blog->type == "with_this_account") {{ $blog->author_name }} @else {{ __('frontend.anonymous') }} @endif</a>
                                <a href="#"><span class="far fa-calendar-alt"></span>{{ Carbon\Carbon::parse($blog->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('MMMM') }} {{ Carbon\Carbon::parse($blog->created_at)->isoFormat('GGGG') }}</a>
                            </div>
                            <p>@php echo html_entity_decode($blog->desc); @endphp</p>
                            <div class="comments-wrap">
                                @if (count($comments) > 0)
                                    <h5 class="inner-header-title">{{ __('frontend.comments') }}({{ count($comments) }})</h5>
                                @endif
                                @foreach ($comments as $comment)
                                        <div class="comment-item">
                                                <i class="fas fa-user font-100 mr-4"></i>
                                            <div class="comment-item-body">
                                                <h6 class="comment-item-title">{{ $comment->name }}</h6>
                                                <div class="comment-meta">
                                                    <span><i class="far fa-calendar-alt"></i>{{ Carbon\Carbon::parse($comment->created_at)->isoFormat('DD') }} {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('MMM') }} {{ Carbon\Carbon::parse($comment->created_at)->isoFormat('GGGG') }}</span>
                                                </div>
                                                <p>{{ $comment->comment }}</p>
                                                <a href="#" class="reply-btn" data-scroll-nav="2"><i class="fa fa-reply"></i> {{ __('frontend.reply') }} </a>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            <div class="leave-comment-wrapper" data-scroll-index="2">
                                <h5 class="inner-header-title">{{ __('frontend.leave_a_comment') }}</h5>
                                <form id="contact-form" action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input name="blog_id" type="hidden" value="{{ Crypt::encrypt($blog->id) }}">
                                    <input name="page" type="hidden" value="{{ Crypt::encrypt(98) }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="comment-form-group">
                                                <input type="text" class="form-control" name="name" placeholder="{{ __('frontend.your_name') }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="comment-form-group">
                                                <input type="email" class="form-control" name="email" placeholder="{{ __('frontend.your_email') }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form-group">
                                                <textarea class="form-control text-area" name="comment" cols="30" rows="9" placeholder="{{ __('frontend.your_comment') }}" autocomplete="off"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="primary-btn">
                                                <span class="text">{{ __('frontend.send_comment') }}</span>
                                                <span class="icon"><i class="fa fa-arrow-right"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-sidebar">
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.search') }}</h5>
                            <form class="search-form" action="{{ route('blog-page.search') }}" method="POST">
                                @csrf
                                <div class="blog-search-bar position-relative">
                                    <input type="text" name="search" placeholder="{{ __('frontend.search_here') }}" class="search-form-control" required>
                                    <button type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">{{ __('frontend.categories') }}</h5>
                            <ul class="sidebar-category-list clearfix">
                                @foreach ($blog_count_categories as $blog_count_category)
                                    <li class="@if ($blog_count_category->category->category_name == $blog->category_name) active @endif">
                                        @if (isset($blog_count_category->category->category_slug))
                                            <a href="{{ url('blog/category/'.$blog_count_category->category->category_slug) }}">{{$blog_count_category->category->category_name }}<span class="category-count">({{ $blog_count_category->category_count }})</span></a>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
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
                                    <a href="{{$blog->getShareUrl('twitter')}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$blog->getShareUrl('whatsapp')}}" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$blog->getShareUrl('pinterest')}}" target="_blank">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @if (!empty($blog->tag))
                            <div class="sidebar-widgets tag-widgets">
                                <h5 class="inner-header-title">{{ __('frontend.tags') }}</h5>
                                @php
                                    $str = $blog->tag;
                                    $array_tags = explode(",",$str);
                                @endphp
                                <ul class="sidebar-tags clearfix">
                                    @foreach ($array_tags as $tag)
                                        <li>
                                            <a href="#">{{ $tag }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// Blog Grid Sidebar End //-->


@endsection
