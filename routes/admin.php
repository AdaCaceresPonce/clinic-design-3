<?php

use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialtyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('services', ServiceController::class);
Route::resource('specialties', SpecialtyController::class);
Route::resource('professionals', ProfessionalController::class);

Route::get('/about-us', function () {
    return view('about_us.about_us');
});
