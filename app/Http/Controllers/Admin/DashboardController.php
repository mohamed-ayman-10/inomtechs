<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Counter;
use App\Models\Admin\Feature;
use App\Models\Admin\Page;
use App\Models\Admin\Service;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models for Landing Site
        $blogs_count = Blog::all()->count();
        $features_count = Feature::all()->count();
        $counters_count = Counter::all()->count();
        $services_count = Service::all()->count();
        $teams_count = Team::all()->count();
        $testimonials_count = Testimonial::all()->count();
        $pages_count = Page::all()->count();

        return view('admin.dashboard', compact('blogs_count',
            'features_count', 'counters_count', 'services_count', 'teams_count',
               'testimonials_count', 'pages_count'));

    }

}
