<?php

use App\Http\Controllers\Admin\ClinicInformationController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\OpinionController;

use App\Http\Controllers\Admin\PagesContents\AboutUsPageContentController;
use App\Http\Controllers\Admin\PagesContents\ContactUsPageContentController;
use App\Http\Controllers\Admin\PagesContents\OurProfessionalsPageContentController;
use App\Http\Controllers\Admin\PagesContents\OurServicesPageContentController;
use App\Http\Controllers\Admin\PagesContents\WelcomePageContentController;
use App\Http\Controllers\Admin\ProfessionalController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\UserController;
use App\Models\ClinicInformation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $clinicInformation = ClinicInformation::first();
    return view('admin.dashboard', compact('clinicInformation'));
})->name('dashboard');

Route::resource('services', ServiceController::class);
Route::resource('specialties', SpecialtyController::class);
Route::resource('professionals', ProfessionalController::class);
// Route::resource('clinic_information', ClinicInformationController::class);

Route::resource('inquiries', InquiryController::class);
Route::resource('opinions', OpinionController::class);

Route::get('welcome_page_content', [WelcomePageContentController::class, 'index'])->name('welcome_page_content.index');
Route::get('welcome_page_content/edit', [WelcomePageContentController::class, 'edit'])->name('welcome_page_content.edit');
Route::put('welcome_page_content', [WelcomePageContentController::class, 'update'])->name('welcome_page_content.update');

Route::get('about_us_page_content', [AboutUsPageContentController::class, 'index'])->name('about_us_page_content.index');
Route::get('about_us_page_content/edit', [AboutUsPageContentController::class, 'edit'])->name('about_us_page_content.edit');
Route::put('about_us_page_content', [AboutUsPageContentController::class, 'update'])->name('about_us_page_content.update');

Route::get('our_services_page_content', [OurServicesPageContentController::class, 'index'])->name('our_services_page_content.index');
Route::get('our_services_page_content/edit', [OurServicesPageContentController::class, 'edit'])->name('our_services_page_content.edit');
Route::put('our_services_page_content', [OurServicesPageContentController::class, 'update'])->name('our_services_page_content.update');

Route::get('our_professionals_page_content', [OurProfessionalsPageContentController::class, 'index'])->name('our_professionals_page_content.index');
Route::get('our_professionals_page_content/edit', [OurProfessionalsPageContentController::class, 'edit'])->name('our_professionals_page_content.edit');
Route::put('our_professionals_page_content', [OurProfessionalsPageContentController::class, 'update'])->name('our_professionals_page_content.update');

Route::get('contact_us_page_content', [ContactUsPageContentController::class, 'index'])->name('contact_us_page_content.index');
Route::get('contact_us_page_content/edit', [ContactUsPageContentController::class, 'edit'])->name('contact_us_page_content.edit');
Route::put('contact_us_page_content', [ContactUsPageContentController::class, 'update'])->name('contact_us_page_content.update');

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('clinic_information', [ClinicInformationController::class, 'index'])->name('clinic_information.index');
Route::get('clinic_information/edit', [ClinicInformationController::class, 'edit'])->name('clinic_information.edit');
Route::put('clinic_information', [ClinicInformationController::class, 'update'])->name('clinic_information.update');
