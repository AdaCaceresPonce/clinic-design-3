<?php

use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\OurProfessionalsController;
use App\Http\Controllers\Web\OurServicesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/about_us', [AboutUsController::class, 'index'])->name('about_us.index');
Route::get('/our_professionals', [OurProfessionalsController::class, 'index'])->name('our_professionals.index');
Route::get('/our_service', [OurServicesController::class, 'index'])->name('our_service.index');
Route::get('/our_service/{service}', [OurServicesController::class, 'show_service'])->name('our_service.show_service');





Route::get('/contact_us', [ContactUsController::class, 'index'])->name('contact_us.index');

// Route::get('/about-us', function () {
//     return view('about_us.about_us');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
