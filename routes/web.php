<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Frontend public pages
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about-us', [FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('contact-us');
Route::get('/pricing', [FrontendController::class, 'pricing'])->name('pricing');
Route::get('/map', [FrontendController::class, 'map'])->name('map');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');

// Auth pages (device-aware, guest only)
Route::middleware('guest')->group(function () {
    Route::get('/employer/login', [FrontendController::class, 'employerLogin'])->name('employer.login');
    Route::get('/employer/register', [FrontendController::class, 'employerRegister'])->name('employer.register');
    Route::get('/guide/login', [FrontendController::class, 'guideLogin'])->name('guide.login');
    Route::get('/guide/register', [FrontendController::class, 'guideRegister'])->name('guide.register');
});

// Employer dashboard routes
Route::middleware(['auth', 'role:employer'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerController::class, 'dashboard'])->name('dashboard');
    Route::get('/search-guide', [EmployerController::class, 'searchGuide'])->name('search-guide');
    Route::get('/booking-guide', [EmployerController::class, 'bookingGuide'])->name('booking-guide');
    Route::get('/guide-detail', [EmployerController::class, 'guideDetail'])->name('guide-detail');
    Route::get('/guide-request', [EmployerController::class, 'guideRequest'])->name('guide-request');
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::post('/message/start', [MessageController::class, 'startConversation'])->name('message.start');
    Route::get('/message/{conversation}', [MessageController::class, 'show'])->name('message.show');
    Route::post('/message/{conversation}/send', [MessageController::class, 'store'])->name('message.send');
    Route::get('/message/{conversation}/fetch', [MessageController::class, 'fetch'])->name('message.fetch');
    Route::get('/add-branches', [EmployerController::class, 'addBranches'])->name('add-branches');
    Route::get('/upcoming-booking', [EmployerController::class, 'upcomingBooking'])->name('upcoming-booking');
    Route::get('/outgoing-booking', [EmployerController::class, 'outgoingBooking'])->name('outgoing-booking');
    Route::get('/payment-history', [EmployerController::class, 'paymentHistory'])->name('payment-history');
    Route::get('/profile', [EmployerController::class, 'myProfile'])->name('my-profile');
    Route::get('/travel-guide', [EmployerController::class, 'travelGuide'])->name('travel-guide');
    Route::get('/branches-list', [EmployerController::class, 'branchesList'])->name('branches-list');
    Route::get('/calendar', [EmployerController::class, 'calendar'])->name('calendar');
});

// Guide dashboard routes
Route::middleware(['auth', 'role:guide'])->prefix('guide')->name('guide.')->group(function () {
    Route::get('/dashboard', [GuideController::class, 'dashboard'])->name('dashboard');
    Route::get('/manage-request', [GuideController::class, 'manageRequest'])->name('manage-request');
    Route::get('/manage-request-view', [GuideController::class, 'manageRequestView'])->name('manage-request-view');
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::get('/message/{conversation}', [MessageController::class, 'show'])->name('message.show');
    Route::post('/message/{conversation}/send', [MessageController::class, 'store'])->name('message.send');
    Route::get('/message/{conversation}/fetch', [MessageController::class, 'fetch'])->name('message.fetch');
    Route::get('/upcoming-tour-request', [GuideController::class, 'upcomingTourRequest'])->name('upcoming-tour-request');
    Route::get('/outgoing-tour-request', [GuideController::class, 'outgoingTourRequest'])->name('outgoing-tour-request');
    Route::get('/profile', [GuideController::class, 'myProfile'])->name('my-profile');
    Route::get('/calendar', [GuideController::class, 'calendar'])->name('calendar');
    Route::get('/travel-details', [GuideController::class, 'travelDetails'])->name('travel-details');
    Route::get('/filter-page', [GuideController::class, 'filterPage'])->name('filter-page');
});

// Shared profile update (used by both employer and guide profile forms)
Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
