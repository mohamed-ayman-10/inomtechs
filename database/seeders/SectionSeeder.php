<?php

namespace Database\Seeders;

use App\Models\Admin\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        Section::create([
            'title' => 'Page Menu',
            'section' => 'page_menu',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'About Us Section',
            'section' => 'about_us_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Feature Section',
            'section' => 'feature_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Service Section',
            'section' => 'service_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Counter Section',
            'section' => 'counter_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Work Process Section',
            'section' => 'work_process_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Skill Section',
            'section' => 'skill_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Portfolio Section',
            'section' => 'portfolio_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Call To Action Section',
            'section' => 'call_to_action_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Team Section',
            'section' => 'team_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Client Section',
            'section' => 'client_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Blog Section',
            'section' => 'blog_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Contact Section',
            'section' => 'contact_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Footer Section',
            'section' => 'footer_section',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Scroll Top Button',
            'section' => 'scroll_top_btn',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'RTL Sidebar',
            'section' => 'rtl_sidebar',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Color Option Sidebar',
            'section' => 'color_option_sidebar',
            'status' => 1
        ]);

        // Create datas
        Section::create([
            'title' => 'Preloader',
            'section' => 'preloader',
            'status' => 1
        ]);

    }
}
