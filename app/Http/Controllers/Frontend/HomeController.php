<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\About;
use App\Models\Admin\Blog;
use App\Models\Admin\BlogPaginate;
use App\Models\Admin\BlogSection;
use App\Models\Admin\ColorOption;
use App\Models\Admin\Contact;
use App\Models\Admin\ContactSection;
use App\Models\Admin\Counter;
use App\Models\Admin\CounterSection;
use App\Models\Admin\ExternalUrl;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use App\Models\Admin\FixedContent;
use App\Models\Admin\GoogleAnalytic;
use App\Models\Admin\HomepageVersion;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioSection;
use App\Models\Admin\QuickAccessButton;
use App\Models\Admin\Service;
use App\Models\Admin\ServicePaginate;
use App\Models\Admin\ServiceSection;
use App\Models\Admin\SiteInfo;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillInfoList;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Team;
use App\Models\Admin\TeamSection;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use App\Models\Admin\Video;
use App\Models\Admin\WorkProcess;
use App\Models\Admin\WorkProcessSection;
use App\Models\Admin\InfoList;

class HomeController extends Controller
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
        $service_limit = 6;
        $blog_limit = 6;

        // Retrieve models
        $site_info = SiteInfo::where('language_id', $language->id)->first();
        $google_analytic = GoogleAnalytic::first();
        $socials = Social::where('status', 1)->get();
        $color_option = ColorOption::first();
        $homepage_version = HomepageVersion::first();
        $external_url = ExternalUrl::where('language_id', $language->id)->where('status', 1)->first();
        $quick_access_button = QuickAccessButton::first();
        $sliders = Slider::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $video = Video::first();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();
        $about = About::where('language_id', $language->id)->first();
        $info_lists = InfoList::where('language_id', $language->id)->get();
        $feature_section = FeatureSection::where('language_id', $language->id)->first();
        $features = Feature::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();
        $service_paginate = ServicePaginate::first();

        if (isset($service_paginate)) {
            $service_limit = $service_paginate->homepage_item;
        }

        $services = Service::where('language_id', $language->id)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->take($service_limit)
            ->get();

        $counter_section = CounterSection::where('language_id', $language->id)->first();
        $counters = Counter::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $work_process_section = WorkProcessSection::where('language_id', $language->id)->first();
        $work_processes = WorkProcess::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $skill = Skill::where('language_id', $language->id)->first();
        $skill_info_lists = SkillInfoList::where('language_id', $language->id)->orderBy('order', 'asc')->get();

        $portfolio_categories = PortfolioCategory::orderBy('order', 'asc')
            ->where('language_id', $language->id)
            ->where('status', 1)
            ->get();
        $portfolio_section = PortfolioSection::where('language_id', $language->id)->first();
        $portfolios = Portfolio::join("portfolio_categories", 'portfolio_categories.id', '=', 'portfolios.category_id')
            ->where('portfolios.language_id', $language->id)
            ->where('portfolio_categories.status', 1)
            ->orderBy('portfolios.id', 'desc')
            ->get();

        $team_section = TeamSection::where('language_id', $language->id)->first();
        $teams = Team::where('language_id', $language->id)->orderBy('order', 'asc')->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('order', 'asc')->get();

        $blog_section = BlogSection::where('language_id', $language->id)->first();
        $blog_paginate = BlogPaginate::first();

        if (isset($blog_paginate)) {
            $blog_limit = $blog_paginate->homepage_item;
        }

        $recent_posts = Blog::join("categories", 'categories.id', '=', 'blogs.category_id')
            ->where('categories.language_id', $language->id)
            ->where('categories.status', 1)
            ->where('blogs.status', 1)
            ->orderBy('blogs.id', 'desc')
            ->take($blog_limit)
            ->get();

        $contact_section = ContactSection::where('language_id', $language->id)->first();
        $contacts = Contact::where('language_id', $language->id)->orderBy('order', 'asc')->get();

        $header_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 1)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();
        $footer_pages = Page::where('language_id', $language->id)
            ->where('display_header_menu', 0)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();


        return view('frontend.home.index', compact('site_info', 'google_analytic', 'socials', 'color_option',
            'homepage_version', 'fixed_content', 'about', 'info_lists', 'feature_section', 'features',
            'service_section', 'services', 'counter_section', 'counters', 'work_process_section', 'work_processes',
            'skill', 'skill_info_lists', 'portfolio_categories', 'portfolio_section', 'portfolios',
            'team_section', 'teams', 'testimonial_section', 'testimonials', 'blog_section',
            'recent_posts', 'contact_section', 'contacts', 'header_pages', 'footer_pages', 'external_url',
            'sliders', 'video', 'quick_access_button'));
    }

}
