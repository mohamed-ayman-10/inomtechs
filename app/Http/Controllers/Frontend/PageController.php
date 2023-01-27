<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;

class PageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($page_slug)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();

        $page = Page::where('pages.page_slug', '=', $page_slug)
            ->firstOrFail();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        return view('frontend.page.show', compact('page', 'site_info', 'google_analytic',
            'socials', 'breadcrumb', 'external_url', 'page', 'footer_pages', 'color_option'));
    }

}
