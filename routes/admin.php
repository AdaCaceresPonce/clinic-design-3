<?php

use App\Http\Controllers\Admin\AboutUsPageContentController;
use App\Http\Controllers\Admin\ClinicInformationController;
use App\Http\Controllers\Admin\ContactUsPageContentController;
use App\Http\Controllers\Admin\OurProfessionalsPageContentController;
use App\Http\Controllers\Admin\OurServicesPageContentController;
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
Route::resource('about_us_page_content', AboutUsPageContentController::class);
Route::resource('our_services_page_content', OurServicesPageContentController::class);
Route::resource('our_professionals_page_content', OurProfessionalsPageContentController::class);
Route::resource('contact_us_page_content', ContactUsPageContentController::class);


