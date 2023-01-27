<?php

namespace Database\Seeders;

use App\Models\Admin\FrontendKeyword;
use Illuminate\Database\Seeder;

class FrontendKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create datas
        FrontendKeyword::insert([
            [
                'language_id' => 1,
                'key' => 'home',
                'value' => 'Home',
            ],
            [
                'language_id' => 1,
                'key' => 'about_us',
                'value' => 'About Us',
            ],
            [
                'language_id' => 1,
                'key' => 'services',
                'value' => 'Services',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio',
                'value' => 'Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'blogs',
                'value' => 'Blogs',
            ],
            [
                'language_id' => 1,
                'key' => 'contact',
                'value' => 'Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'pages',
                'value' => 'Pages',
            ],
            [
                'language_id' => 1,
                'key' => 'download',
                'value' => 'Download',
            ],
            [
                'language_id' => 1,
                'key' => 'read_more',
                'value' => 'Read More',
            ],
            [
                'language_id' => 1,
                'key' => 'back_to_home',
                'value' => 'Back To Home',
            ],
            [
                'language_id' => 1,
                'key' => 'scroll_down',
                'value' => 'Scroll Down',
            ],
            [
                'language_id' => 1,
                'key' => 'service_details',
                'value' => 'Service Details',
            ],
            [
                'language_id' => 1,
                'key' => 'recent_posts',
                'value' => 'Recent Posts',
            ],
            [
                'language_id' => 1,
                'key' => 'share',
                'value' => 'Share',
            ],
            [
                'language_id' => 1,
                'key' => 'subscribe_newsletter',
                'value' => 'Subscribe Newsletter',
            ],
            [
                'language_id' => 1,
                'key' => 'enter_email',
                'value' => 'Enter Email',
            ],
            [
                'language_id' => 1,
                'key' => 'all',
                'value' => 'All',
            ],
            [
                'language_id' => 1,
                'key' => 'do_you_need_a_new_project',
                'value' => 'Do you need a new project?',
            ],
            [
                'language_id' => 1,
                'key' => 'get_in_touch',
                'value' => 'Get In Touch',
            ],
            [
                'language_id' => 1,
                'key' => 'anonymous',
                'value' => 'Anonymous',
            ],
            [
                'language_id' => 1,
                'key' => 'name',
                'value' => 'Name',
            ],
            [
                'language_id' => 1,
                'key' => 'email',
                'value' => 'Email',
            ],
            [
                'language_id' => 1,
                'key' => 'subject',
                'value' => 'Subject',
            ],
            [
                'language_id' => 1,
                'key' => 'send_message',
                'value' => 'Send Message',
            ],
            [
                'language_id' => 1,
                'key' => 'customer_relationship',
                'value' => 'Customer Relationship',
            ],
            [
                'language_id' => 1,
                'key' => 'address',
                'value' => 'Address',
            ],
            [
                'language_id' => 1,
                'key' => 'address_map_link',
                'value' => 'Address Map Link',
            ],
            [
                'language_id' => 1,
                'key' => 'email_and_phone',
                'value' => 'Email And Phone',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio_details',
                'value' => 'Portfolio Details',
            ],
            [
                'language_id' => 1,
                'key' => 'search',
                'value' => 'Search',
            ],
            [
                'language_id' => 1,
                'key' => 'search_here',
                'value' => 'Search Here...',
            ],
            [
                'language_id' => 1,
                'key' => 'categories',
                'value' => 'Categories',
            ],
            [
                'language_id' => 1,
                'key' => 'tags',
                'value' => 'Tags',
            ],
            [
                'language_id' => 1,
                'key' => 'leave_a_comment',
                'value' => 'Leave A Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'your_name',
                'value' => 'Your Name',
            ],
            [
                'language_id' => 1,
                'key' => 'your_email',
                'value' => 'Your Email',
            ],
            [
                'language_id' => 1,
                'key' => 'your_comment',
                'value' => 'Your Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'send_comment',
                'value' => 'Send Comment',
            ],
            [
                'language_id' => 1,
                'key' => 'search_results',
                'value' => 'Search Results',
            ],
            [
                'language_id' => 1,
                'key' => 'nothing_found',
                'value' => 'Nothing Found',
            ],
            [
                'language_id' => 1,
                'key' => 'your_message_has_been_delivered',
                'value' => 'Your message has been delivered.',
            ],
            [
                'language_id' => 1,
                'key' => 'your_comment_is_pending_approval',
                'value' => 'Your comment is pending approval.',
            ]

            ]);
    }
}
