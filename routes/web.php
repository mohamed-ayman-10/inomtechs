<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorOptionController;
use App\Http\Controllers\Admin\CommentSectionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CounterSectionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DemoModeController;
use App\Http\Controllers\Admin\ErrorPageController;
use App\Http\Controllers\Admin\ExternalUrlController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureSectionController;
use App\Http\Controllers\Admin\FixedContentController;
use App\Http\Controllers\Admin\GoogleAnalyticController;
use App\Http\Controllers\Admin\HomepageVersionController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LanguageKeywordController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioDetailController;
use App\Http\Controllers\Admin\PortfolioSectionController;
use App\Http\Controllers\Admin\PortfolioSliderController;
use App\Http\Controllers\Admin\PreviewController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\QuickAccessButtonController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceDetailController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\SiteImageController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamSectionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Admin\WorkProcessSectionController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Start Site Frontend Route
Route::get('/', [HomeController::class, 'index'])->name('homepage')->middleware('XSS');

Route::post('subscribe', [\App\Http\Controllers\Frontend\SubscribeController::class, 'store'])
    ->name('subscribe-section.store')->middleware('XSS');

Route::middleware(['XSS'])->group(function () {
    Route::get('services', [\App\Http\Controllers\Frontend\ServiceController::class, 'index'])
        ->name('service-page.index');
    Route::get('service/{service_slug}', [App\Http\Controllers\Frontend\ServiceController::class, 'show'])
        ->name('service-page.show');
});

Route::middleware(['XSS'])->group(function () {
    Route::get('portfolio/{portfolio_slug}', [App\Http\Controllers\Frontend\PortfolioController::class, 'show'])
        ->name('portfolio-page.show');
    Route::get('portfolio/category/{category_name}', [App\Http\Controllers\Frontend\PortfolioController::class, 'category_show'])
        ->name('portfolio-category.show');
});

Route::post('message', [App\Http\Controllers\Frontend\MessageController::class, 'store'])
    ->name('message.store')->middleware('XSS');

Route::middleware(['XSS'])->group(function () {
    Route::get('blogs', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog-page.index');
    Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog-page.show');
    Route::get('blog/category/{category_name}', [App\Http\Controllers\Frontend\BlogController::class, 'category_show'])->name('blog-category.show');
    Route::post('blog/search', [App\Http\Controllers\Frontend\BlogController::class, 'search'])->name('blog-page.search');
});

Route::get('page/{page_slug}', [App\Http\Controllers\Frontend\PageController::class, 'show'])
    ->name('any-page.show')->middleware('XSS');

Route::post('comment', [App\Http\Controllers\Frontend\CommentController::class, 'store'])
    ->name('comment.store')->middleware('XSS');
// End Site Frontend Route

// Start Site Admin Route
Route::middleware(['auth:sanctum', 'verified', 'XSS', 'role:super-admin'])->prefix('admin')->group(function () {
    Route::get('admin-role', [AdminRoleController::class, 'index'])->name('admin-role.index');
    Route::get('admin-role/create', [AdminRoleController::class, 'create'])->name('admin-role.create');
    Route::post('admin-role', [AdminRoleController::class, 'store'])->name('admin-role.store');
    Route::get('admin-role/{id}/edit', [AdminRoleController::class, 'edit'])->name('admin-role.edit');
    Route::put('admin-role/{id}', [AdminRoleController::class, 'update'])->name('admin-role.update');
    Route::delete('admin-role/{id}', [AdminRoleController::class, 'destroy'])->name('admin-role.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'role:super-admin'])->prefix('admin')->group(function () {
    Route::get('admin-user', [AdminUserController::class, 'index'])->name('admin-user.index');
    Route::get('admin-user/create', [AdminUserController::class, 'create'])->name('admin-user.create');
    Route::post('admin-user', [AdminUserController::class, 'store'])->name('admin-user.store');
    Route::get('admin-user/{id}/edit', [AdminUserController::class, 'edit'])->name('admin-user.edit');
    Route::put('admin-user/{id}', [AdminUserController::class, 'update'])->name('admin-user.update');
    Route::delete('admin-user/{id}', [AdminUserController::class, 'destroy'])->name('admin-user.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:uploads check'])->prefix('admin')->group(function () {
    Route::get('photo/create', [PhotoController::class, 'create'])->name('photo.create');
    Route::post('photo', [PhotoController::class, 'store'])->name('photo.store');
    Route::get('photo/{id}/edit', [PhotoController::class, 'edit'])->name('photo.edit');
    Route::put('photo/{id}', [PhotoController::class, 'update'])->name('photo.update');
    Route::delete('photo/{id}', [PhotoController::class, 'destroy'])->name('photo.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:subscribe check'])->prefix('admin')->group(function () {
    Route::get('subscribe/create', [SubscribeController::class, 'create'])->name('subscribe.create');
    Route::post('subscribe', [SubscribeController::class, 'store'])->name('subscribe.store');
    Route::delete('subscribe/{id}', [SubscribeController::class, 'destroy'])->name('subscribe.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:banner check'])->prefix('admin')->group(function () {
    Route::get('fixed-content/create', [FixedContentController::class, 'create'])->name('fixed-content.create');
    Route::post('fixed-content', [FixedContentController::class, 'store'])->name('fixed-content.store');
    Route::put('fixed-content/{id}', [FixedContentController::class, 'update'])->name('fixed-content.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:banner check'])->prefix('admin')->group(function () {
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
    Route::delete('slider-checked', [SliderController::class, 'destroy_checked'])->name('slider.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:banner check'])->prefix('admin')->group(function () {
    Route::get('video/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('video', [VideoController::class, 'store'])->name('video.store');
    Route::put('video/{id}', [VideoController::class, 'update'])->name('video.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:banner check'])->prefix('admin')->group(function () {
    Route::get('homepage-version/create', [HomepageVersionController::class, 'create'])->name('homepage-version.create');
    Route::put('homepage-version/{id}', [HomepageVersionController::class, 'update'])->name('homepage-version.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:external url check'])->prefix('admin')->group(function () {
    Route::get('external-url/create', [ExternalUrlController::class, 'create'])->name('external-url.create');
    Route::post('external-url', [ExternalUrlController::class, 'store'])->name('external-url.store');
    Route::put('external-url/{id}', [ExternalUrlController::class, 'update'])->name('external-url.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS',  'permission:about us check'])->prefix('admin')->group(function () {
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about', [AboutController::class, 'store'])->name('about.store');
    Route::put('about/{id}', [AboutController::class, 'update'])->name('about.update');

    Route::post('info-list', [AboutController::class, 'store_info_list'])->name('about.store_info_list');
    Route::get('info-list/{id}/edit', [AboutController::class, 'edit_info_list'])->name('about.edit_info_list');
    Route::put('info-list/{id}', [AboutController::class, 'update_info_list'])->name('about.update_info_list');
    Route::delete('info-list/{id}', [AboutController::class, 'destroy_info_list'])->name('about.destroy_info_list');
    Route::delete('info-list-checked', [AboutController::class, 'destroy_checked'])->name('about.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:features check'])->prefix('admin')->group(function () {
    Route::get('feature/create', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('feature/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::put('feature/{id}', [FeatureController::class, 'update'])->name('feature.update');
    Route::delete('feature/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
    Route::delete('feature-checked', [FeatureController::class, 'destroy_checked'])->name('feature.destroy_checked');

    Route::post('feature-section', [FeatureSectionController::class, 'store'])->name('feature-section.store');
    Route::put('feature-section/{id}', [FeatureSectionController::class, 'update'])->name('feature-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:services check'])->prefix('admin')->group(function () {
    Route::get('service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    Route::delete('service-checked', [ServiceController::class, 'destroy_checked'])->name('service.destroy_checked');

    Route::post('service-section', [ServiceSectionController::class, 'store'])->name('service-section.store');
    Route::put('service-section/{id}', [ServiceSectionController::class, 'update'])->name('service-section.update');

    Route::get('service-detail/{id}/create', [ServiceDetailController::class, 'create'])->name('service-detail.create');
    Route::post('service-detail/{id}', [ServiceDetailController::class, 'store'])->name('service-detail.store');
    Route::get('service-detail/{event_id}/{id}/edit', [ServiceDetailController::class, 'edit'])->name('service-detail.edit');
    Route::put('service-detail/{id}', [ServiceDetailController::class, 'update'])->name('service-detail.update');
    Route::delete('service-detail/{id}', [ServiceDetailController::class, 'destroy'])->name('service-detail.destroy');
    Route::delete('service-detail-checked/{id}', [ServiceDetailController::class, 'destroy_checked'])->name('service-detail.destroy_checked');

    Route::get('service-paginate/create', [ServiceController::class, 'create_paginate'])->name('service-paginate.create_paginate');
    Route::post('service-paginate', [ServiceController::class, 'store_paginate'])->name('service-paginate.store_paginate');
    Route::put('service-paginate/{id}', [ServiceController::class, 'update_paginate'])->name('service-paginate.update_paginate');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:counters check'])->prefix('admin')->group(function () {
    Route::get('counter/create', [CounterController::class, 'create'])->name('counter.create');
    Route::post('counter', [CounterController::class, 'store'])->name('counter.store');
    Route::get('counter/{id}/edit', [CounterController::class, 'edit'])->name('counter.edit');
    Route::put('counter/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::delete('counter/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');
    Route::delete('counter-checked', [CounterController::class, 'destroy_checked'])->name('counter.destroy_checked');

    Route::post('counter-section', [CounterSectionController::class, 'store'])->name('counter-section.store');
    Route::put('counter-section/{id}', [CounterSectionController::class, 'update'])->name('counter-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:work processes check'])->prefix('admin')->group(function () {
    Route::get('work-process/create', [WorkProcessController::class, 'create'])->name('work-process.create');
    Route::post('work-process', [WorkProcessController::class, 'store'])->name('work-process.store');
    Route::get('work-process/{id}/edit', [WorkProcessController::class, 'edit'])->name('work-process.edit');
    Route::put('work-process/{id}', [WorkProcessController::class, 'update'])->name('work-process.update');
    Route::delete('work-process/{id}', [WorkProcessController::class, 'destroy'])->name('work-process.destroy');
    Route::delete('work-process-checked', [WorkProcessController::class, 'destroy_checked'])->name('work-process.destroy_checked');

    Route::post('work-process-section', [WorkProcessSectionController::class, 'store'])->name('work-process-section.store');
    Route::put('work-process-section/{id}', [WorkProcessSectionController::class, 'update'])->name('work-process-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS',  'permission:skill check'])->prefix('admin')->group(function () {
    Route::get('skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('skill', [SkillController::class, 'store'])->name('skill.store');
    Route::put('skill/{id}', [SkillController::class, 'update'])->name('skill.update');

    Route::post('skill-info-list', [SkillController::class, 'store_info_list'])->name('skill.store_info_list');
    Route::get('skill-info-list/{id}/edit', [SkillController::class, 'edit_info_list'])->name('skill.edit_info_list');
    Route::put('skill-info-list/{id}', [SkillController::class, 'update_info_list'])->name('skill.update_info_list');
    Route::delete('skill-info-list/{id}', [SkillController::class, 'destroy_info_list'])->name('skill.destroy_info_list');
    Route::delete('skill-info-list-checked', [SkillController::class, 'destroy_checked'])->name('skill.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:portfolio check'])->prefix('admin')->group(function () {
    Route::get('portfolio-category/create', [PortfolioCategoryController::class, 'create'])->name('portfolio-category.create');
    Route::post('portfolio-category', [PortfolioCategoryController::class, 'store'])->name('portfolio-category.store');
    Route::get('portfolio-category/{id}/edit', [PortfolioCategoryController::class, 'edit'])->name('portfolio-category.edit');
    Route::put('portfolio-category/{id}', [PortfolioCategoryController::class, 'update'])->name('portfolio-category.update');
    Route::delete('portfolio-category/{id}', [PortfolioCategoryController::class, 'destroy'])->name('portfolio-category.destroy');
    Route::delete('portfolio-category-checked', [PortfolioCategoryController::class, 'destroy_checked'])->name('portfolio-category.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:portfolio check'])->prefix('admin')->group(function () {
    Route::get('portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::delete('portfolio-checked', [PortfolioController::class, 'destroy_checked'])->name('portfolio.destroy_checked');

    Route::post('portfolio-section', [PortfolioSectionController::class, 'store'])->name('portfolio-section.store');
    Route::put('portfolio-section/{id}', [PortfolioSectionController::class, 'update'])->name('portfolio-section.update');

    Route::get('portfolio-slider/{id}/create', [PortfolioSliderController::class, 'create'])->name('portfolio-slider.create');
    Route::post('portfolio-slider/{id}', [PortfolioSliderController::class, 'store'])->name('portfolio-slider.store');
    Route::get('portfolio-slider/{portfolio_id}/{id}/edit', [PortfolioSliderController::class, 'edit'])->name('portfolio-slider.edit');
    Route::put('portfolio-slider/{id}', [PortfolioSliderController::class, 'update'])->name('portfolio-slider.update');
    Route::delete('portfolio-slider/{id}', [PortfolioSliderController::class, 'destroy'])->name('portfolio-slider.destroy');
    Route::delete('portfolio-slider-checked/{id}', [PortfolioSliderController::class, 'destroy_checked'])->name('portfolio-slider.destroy_checked');

    Route::get('portfolio-detail/{id}/create', [PortfolioDetailController::class, 'create'])->name('portfolio-detail.create');
    Route::post('portfolio-detail/{id}', [PortfolioDetailController::class, 'store'])->name('portfolio-detail.store');
    Route::get('portfolio-detail/{portfolio_id}/{id}/edit', [PortfolioDetailController::class, 'edit'])->name('portfolio-detail.edit');
    Route::put('portfolio-detail/{id}', [PortfolioDetailController::class, 'update'])->name('portfolio-detail.update');
    Route::delete('portfolio-detail/{id}', [PortfolioDetailController::class, 'destroy'])->name('portfolio-detail.destroy');
    Route::delete('portfolio-detail-checked/{id}', [PortfolioDetailController::class, 'destroy_checked'])->name('portfolio-detail.destroy_checked');

});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:teams check'])->prefix('admin')->group(function () {
    Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('team', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');
    Route::delete('team-checked', [TeamController::class, 'destroy_checked'])->name('team.destroy_checked');

    Route::post('team-section', [TeamSectionController::class, 'store'])->name('team-section.store');
    Route::put('team-section/{id}', [TeamSectionController::class, 'update'])->name('team-section.update');
});


Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:testimonials check'])->prefix('admin')->group(function () {
    Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::delete('testimonial-checked', [TestimonialController::class, 'destroy_checked'])->name('testimonial.destroy_checked');

    Route::post('testimonial-section', [TestimonialSectionController::class, 'store'])->name('testimonial-section.store');
    Route::put('testimonial-section/{id}', [TestimonialSectionController::class, 'update'])->name('testimonial-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:blogs check'])->prefix('admin')->group(function () {
    Route::get('category/create', [CategoryController::class, 'create'])->name('blog-category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('blog-category.store');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('blog-category.edit');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('blog-category.destroy');
    Route::delete('category-checked', [CategoryController::class, 'destroy_checked'])->name('blog-category.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:blogs check'])->prefix('admin')->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::delete('blog-checked', [BlogController::class, 'destroy_checked'])->name('blog.destroy_checked');

    Route::post('blog-section', [BlogSectionController::class, 'store'])->name('blog-section.store');
    Route::put('blog-section/{id}', [BlogSectionController::class, 'update'])->name('blog-section.update');

    Route::get('blog-paginate/create', [BlogController::class, 'create_paginate'])->name('blog-paginate.create_paginate');
    Route::post('blog-paginate', [BlogController::class, 'store_paginate'])->name('blog-paginate.store_paginate');
    Route::put('blog-paginate/{id}', [BlogController::class, 'update_paginate'])->name('blog-paginate.update_paginate');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('site-info/create', [SiteInfoController::class, 'create'])->name('site-info.create');
    Route::post('site-info', [SiteInfoController::class, 'store'])->name('site-info.store');
    Route::put('site-info/{id}', [SiteInfoController::class, 'update'])->name('site-info.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('site-image/create', [SiteImageController::class, 'create'])->name('site-image.create');
    Route::post('site-image', [SiteImageController::class, 'store'])->name('site-image.store');
    Route::put('site-image/{id}', [SiteImageController::class, 'update'])->name('site-image.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('google-analytic/create', [GoogleAnalyticController::class, 'create'])->name('google-analytic.create');
    Route::post('google-analytic', [GoogleAnalyticController::class, 'store'])->name('google-analytic.store');
    Route::put('google-analytic/{id}', [GoogleAnalyticController::class, 'update'])->name('google-analytic.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('breadcrumb/create', [BreadcrumbController::class, 'create'])->name('breadcrumb.create');
    Route::post('breadcrumb', [BreadcrumbController::class, 'store'])->name('breadcrumb.store');
    Route::put('breadcrumb/{id}', [BreadcrumbController::class, 'update'])->name('breadcrumb.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('section/create',  [SectionController::class, 'create'])->name('section.create');
    Route::patch('section/{id}',  [SectionController::class, 'update'])->name('section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
    Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:settings check'])->prefix('admin')->group(function () {
    Route::get('color-option/create', [ColorOptionController::class, 'create'])->name('color-option.create');
    Route::post('color-option', [ColorOptionController::class, 'store'])->name('color-option.store');
    Route::put('color-option/{id}', [ColorOptionController::class, 'update'])->name('color-option.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:contact check'])->prefix('admin')->group(function () {
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::post('contact-section', [ContactSectionController::class, 'store'])->name('contact-section.store');
    Route::put('contact-section/{id}', [ContactSectionController::class, 'update'])->name('contact-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:contact check'])->prefix('admin')->group(function () {
    Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
    Route::post('social', [SocialController::class, 'store'])->name('social.store');
    Route::get('social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('social/{id}', [SocialController::class, 'update'])->name('social.update');
    Route::patch('social/update_status/{id}', [SocialController::class, 'update_status'])->name('social.update_status');
    Route::delete('social/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:contact check'])->prefix('admin')->group(function () {
    Route::get('quick-access/create', [QuickAccessButtonController::class, 'create'])->name('quick-access.create');
    Route::post('quick-access', [QuickAccessButtonController::class, 'store'])->name('quick-access.store');
    Route::put('quick-access/{id}', [QuickAccessButtonController::class, 'update'])->name('quick-access.update');
});

Route::middleware(['auth:sanctum', 'verified', 'permission:contact check'])->prefix('admin')->group(function () {
    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::put('message/{id}', [MessageController::class, 'update'])->name('message.update');
    Route::patch('message/mark_all', [MessageController::class, 'mark_all_read_update'])->name('message.mark_all_read_update');
    Route::delete('message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:pages check'])->prefix('admin')->group(function () {
    Route::get('page', [PageController::class, 'index'])->name('page.index');
    Route::get('page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('page', [PageController::class, 'store'])->name('page.store');
    Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
    Route::delete('page/{id}', [PageController::class, 'destroy'])->name('page.destroy');
    Route::delete('page-checked', [PageController::class, 'destroy_checked'])->name('page.destroy_checked');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:comments check'])->prefix('admin')->group(function () {
    Route::get('comment', [CommentSectionController::class, 'index'])->name('comment-section.index');
    Route::put('comment/{id}', [CommentSectionController::class, 'update'])->name('comment-section.update');
    Route::patch('comment/mark_all', [CommentSectionController::class, 'mark_all_approval_update'])->name('comment-section.mark_all_approval_update');
    Route::delete('comment/{id}', [CommentSectionController::class, 'destroy'])->name('comment-section.destroy');
});


Route::post('admin/demo-mode', [DemoModeController::class, 'update_demo_mode'])->name('admin.demo_mode');;

Route::get('preview', [PreviewController::class, 'index'])
    ->name('preview.index')->middleware('XSS');

Route::get('preview/set-homepage/{choose_version_id}', [PreviewController::class, 'set_homepage'])
    ->name('preview.set_homepage')->middleware('XSS');
// End Landing Site Admin Route



Route::middleware(['auth:sanctum', 'verified', 'XSS'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/change-password', [ProfileController::class, 'change_password_edit'])->name('profile.change_password_edit');
    Route::put('profile/change-password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password_update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:language check'])->prefix('admin')->group(function () {
    Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('language', [LanguageController::class, 'store'])->name('language.store');
    Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
    Route::patch('language/language-select', [LanguageController::class, 'update_language'])->name('language.update_language');
    Route::patch('language/processed-language', [LanguageController::class, 'update_processed_language'])->name('language.update_processed_language');
    Route::put('language/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::patch('language/update_display_dropdown/{id}', [LanguageController::class, 'update_display_dropdown'])->name('language.update_display_dropdown');
    Route::delete('language/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');
});

Route::get('language/set-locale/{language_id}', [LanguageController::class, 'set_locale'])
    ->name('language.set_locale')->middleware('XSS');

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:language check'])->prefix('admin')->group(function () {

    Route::get('language-keyword-for-adminpanel/create/{id}', [LanguageKeywordController::class, 'create'])
        ->name('language-keyword-for-adminpanel.create');
    Route::get('language-keyword-for-frontend/frontend-create/{id}', [LanguageKeywordController::class, 'frontend_create'])
        ->name('language-keyword-for-frontend.frontend_create');

    Route::post('panel-keyword', [LanguageKeywordController::class, 'store_panel_keyword'])
        ->name('panel-keyword.store_panel_keyword');
    Route::put('panel-keyword', [LanguageKeywordController::class, 'update_panel_keyword'])
        ->name('panel-keyword.update_panel_keyword');

    Route::post('frontend-keyword', [LanguageKeywordController::class, 'store_frontend_keyword'])
        ->name('frontend-keyword.store_frontend_keyword');
    Route::put('frontend-keyword', [LanguageKeywordController::class, 'update_frontend_keyword'])
        ->name('frontend-keyword.update_frontend_keyword');


});

Route::middleware(['auth:sanctum', 'verified', 'XSS', 'permission:clear cache check'])->prefix('admin')->group(function () {
    Route::get('clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('dashboard')
            ->with('success','content.created_successfully');
    });
});

Route::middleware(['XSS'])->group(function () {
    Route::get('run-updater', function() {
        Artisan::call('migrate');
        return "The update is complete :)";
    });
});

Route::any('{catchall}', [ErrorPageController::class, 'not_found'])->where('catchall', '.*');




