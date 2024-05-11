<?php

use App\Http\Controllers\Admin\ClinicInformationController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\WelcomePageContentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('services', ServiceController::class);
Route::resource('specialties', SpecialtyController::class);
Route::resource('professionals', ProfessionalController::class);
Route::resource('clinic_information', ClinicInformationController::class);

Route::resource('welcome_page_content', WelcomePageContentController::class);


