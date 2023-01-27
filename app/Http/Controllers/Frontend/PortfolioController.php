<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Breadcrumb;
use App\Models\Admin\ColorOption;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioSlider;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Social;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
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


        $portfolio = Portfolio::where('portfolios.portfolio_slug', '=', $slug)
            ->firstOrFail();

        $details = PortfolioDetail::where('portfolio_id', $portfolio->id)->get();
        $sliders = PortfolioSlider::where('portfolio_id', $portfolio->id)->get();

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

        $portfolio_count_categories = Portfolio::select(DB::raw('count(*) as category_count, category_id'))
            ->where('language_id', $language->id)
            ->where('portfolios.status', 1)
            ->groupBy('category_id')
            ->get();

        return view('frontend.portfolio.show', compact('site_info', 'google_analytic',
            'socials', 'breadcrumb', 'external_url', 'quick_access_button', 'recent_posts', 'footer_pages',
            'portfolio', 'details', 'sliders', 'portfolio_count_categories', 'color_option'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $category_name
     * @return \Illuminate\Http\Response
     */
    public function category_show($category_name)
    {
        // Get site language
        $language = getSiteLanguage();

        // Retrieving models
        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $breadcrumb = Breadcrumb::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();
        $quick_access_button = QuickAccessButton::first();

        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolio_categories.language_id', $language->id)
            ->where('portfolio_categories.portfolio_category_slug', '=', $category_name)
            ->where('portfolios.status', 1)
            ->orderBy('portfolios.id', 'desc')
            ->paginate(9);

        $category = PortfolioCategory::where('language_id', $language->id)
            ->where('portfolio_category_slug', '=', $category_name)->first();

        if (count($portfolios) < 1) {
            abort(404);
        }

        return view('frontend.portfolio.category-show', compact('site_info',
            'google_analytic', 'socials', 'breadcrumb', 'external_url', 'quick_access_button',
            'footer_pages', 'portfolios', 'category', 'color_option'));
    }

}
