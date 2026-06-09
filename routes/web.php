<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\EditorImageUploadController;
use App\Http\Controllers\Admin\MailToolController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\UserAlertController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TourController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/policy', [PageController::class, 'policy'])->name('policy');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.subscribe');

Route::get('/contact', [ContactPageController::class, 'show'])->name('contact');
Route::post('/contact', [ContactPageController::class, 'store'])->name('contact.submit');

Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
Route::get('/tours/category/{category}', [TourController::class, 'category'])->name('tours.category');
Route::get('/tours/{slug}', [TourController::class, 'show'])->name('tours.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{key}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{key}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::middleware('auth')->group(function () {
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.checkout.store');
});

Route::get('/destinations', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinations/{slug}', [DestinationController::class, 'show'])->name('destinations.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/team', [TeamController::class, 'index'])->name('team.index');

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::post('/bookings', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}/payment', [OrderController::class, 'payment'])->name('orders.payment');
Route::post('/orders/{order}/payment/verify', [OrderController::class, 'verifyRazorpayPayment'])->name('orders.payment.verify');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('destinations', AdminDestinationController::class)->except(['show']);
        Route::get('tours/export', [AdminTourController::class, 'export'])->name('tours.export');
        Route::post('tours/import', [AdminTourController::class, 'import'])->name('tours.import');
        Route::resource('tours', AdminTourController::class)->except(['show']);
        Route::resource('blog-posts', BlogPostController::class)->except(['show']);
        Route::post('editor-image-upload', EditorImageUploadController::class)->name('editor-image-upload');
        Route::resource('team-members', TeamMemberController::class)->except(['show']);

        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}/edit', [AdminOrderController::class, 'edit'])->name('orders.edit');
        Route::put('orders/{order}', [AdminOrderController::class, 'update'])->name('orders.update');
        Route::post('orders/{order}/resend-email', [AdminOrderController::class, 'resendBookingEmail'])->name('orders.resend-email');

        Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{contact_message}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{contact_message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('notifications', [UserAlertController::class, 'index'])->name('notifications.index');
        Route::get('notifications/create', [UserAlertController::class, 'create'])->name('notifications.create');
        Route::post('notifications', [UserAlertController::class, 'store'])->name('notifications.store');

        Route::get('mail', [MailToolController::class, 'index'])->name('mail.index');
        Route::post('mail/send', [MailToolController::class, 'send'])->name('mail.send');

        Route::get('settings/header', [SiteSettingsController::class, 'header'])->name('settings.header');
        Route::put('settings/header', [SiteSettingsController::class, 'updateHeader'])->name('settings.header.update');
        Route::get('settings/homepage', [SiteSettingsController::class, 'homepage'])->name('settings.homepage');
        Route::put('settings/homepage', [SiteSettingsController::class, 'updateHomepage'])->name('settings.homepage.update');
    });
});

Route::get('/home', function () {
    return redirect()->route('dashboard');
});
