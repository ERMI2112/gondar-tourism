<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\GuideRequestController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AttractionController as AdminAttractionController;
use App\Http\Controllers\Admin\GuideController as AdminGuideController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\RequestController;

// Public
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/attractions', [AttractionController::class, 'index'])->name('attractions.index');
Route::get('/attractions/{attraction}', [AttractionController::class, 'show'])->name('attractions.show');
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels.index');
Route::get('/hotels/{hotel}', [HotelController::class, 'show'])->name('hotels.show');
Route::get('/guides', [GuideController::class, 'index'])->name('guides.index');
Route::get('/guides/{guide}', [GuideController::class, 'show'])->name('guides.show');
Route::get('/guides-register', [GuideController::class, 'create'])->name('guides.create');
Route::post('/guides-register', [GuideController::class, 'store'])->name('guides.store');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/guide-requests', [GuideRequestController::class, 'store'])->name('guide-requests.store');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

Route::view('/contact', 'contact')->name('contact');

// Auth (Breeze)
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin() || auth()->user()->isTourismOfficer()) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware(['auth'])->name('dashboard');

// Admin
Route::middleware(['auth', 'admin.only'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/attractions', [AdminAttractionController::class, 'index'])->name('attractions.index');
    Route::get('/attractions/create', [AdminAttractionController::class, 'create'])->name('attractions.create');
    Route::post('/attractions', [AdminAttractionController::class, 'store'])->name('attractions.store');
    Route::get('/attractions/{attraction}/edit', [AdminAttractionController::class, 'edit'])->name('attractions.edit');
    Route::put('/attractions/{attraction}', [AdminAttractionController::class, 'update'])->name('attractions.update');
    Route::delete('/attractions/{attraction}', [AdminAttractionController::class, 'destroy'])->name('attractions.destroy');

    Route::get('/guides', [AdminGuideController::class, 'index'])->name('guides.index');
    Route::post('/guides/{guide}/approve', [AdminGuideController::class, 'approve'])->name('guides.approve');
    Route::post('/guides/{guide}/reject', [AdminGuideController::class, 'reject'])->name('guides.reject');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [AdminEventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [AdminEventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');

    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::put('/requests/{guideRequest}', [RequestController::class, 'update'])->name('requests.update');
});
