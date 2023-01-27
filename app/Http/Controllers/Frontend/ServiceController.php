<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceDetail;
use App\Models\Admin\ServicePaginate;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get site language
        $language = getSiteLanguage();

        // Default values
        $service_paginate_limit = 9;

        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();
        $quick_access_button = QuickAccessButton::first();
        $service_paginate = ServicePaginate::first();

        if (isset($service_paginate)) {
            $service_paginate_limit = $service_paginate->paginate;
        }

        $services = Service::where('language_id', $language->id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->paginate($service_paginate_limit);

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return view('frontend.service.index', compact('site_info', 'google_analytic',
            'socials', 'breadcrumb', 'services', 'external_url', 'quick_access_button',
            'footer_pages', 'color_option'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();
        $quick_access_button = QuickAccessButton::first();

        $service = Service::where('services.service_slug', '=', $slug)
            ->firstOrFail();
        $details = ServiceDetail::where('service_id', $service->id)->get();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take(3)
            ->get();

        return view('frontend.service.show', compact('site_info', 'google_analytic',
            'socials', 'breadcrumb', 'service', 'details', 'footer_pages', 'external_url',
            'quick_access_button', 'recent_posts', 'color_option'));
    }

}
