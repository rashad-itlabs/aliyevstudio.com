<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Docly;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('docly/dashboard',[Docly::class, 'dashboard'])->name('docly.dashboard');
Route::get('docly/appointments',[Docly::class, 'appointments'])->name('docly.appointments');
Route::get('docly/patients', [Docly::class, 'patients'])->name('docly.patients');
Route::post('docly/patients', [Docly::class, 'storePatient'])->name('docly.patients.store');
Route::put('docly/patients/{id}', [Docly::class, 'updatePatient'])->name('docly.patients.update');
Route::delete('docly/patients/{id}', [Docly::class, 'destroyPatient'])->name('docly.patients.destroy');
Route::get('docly/doctors', [Docly::class, 'doctors'])->name('docly.doctors');
Route::post('docly/doctors', [Docly::class, 'storeDoctor'])->name('docly.doctors.store');
Route::put('docly/doctors/{id}', [Docly::class, 'updateDoctor'])->name('docly.doctors.update');
Route::delete('docly/doctors/{id}', [Docly::class, 'destroyDoctor'])->name('docly.doctors.destroy');
Route::get('docly/doctors/{id}/appointments', [Docly::class, 'doctorAppointments'])->name('docly.doctors.appointments');
Route::get('docly/settings', [Docly::class, 'settings'])->name('docly.settings');
Route::post('docly/settings/send-notification', [Docly::class, 'sendNotification'])->name('docly.settings.send_notification');


Route::get('/',[HomeController::class, 'index']);
Route::get('privacy',[HomeController::class, 'privacy'])->name('privacy');
Route::get('portfolio',[HomeController::class, 'portfolio'])->name('portfolio');
Route::get('services',[HomeController::class, 'services'])->name('services');
Route::get('contact',[HomeController::class, 'contact'])->name('contact');
Route::get('about',[HomeController::class, 'about'])->name('about');
Route::get('blog',[HomeController::class, 'blog'])->name('blog');
Route::get('blog-detail/{slug}',[HomeController::class, 'blog_detail'])->name('blog-detail');
Route::get('ourTeam',[HomeController::class, 'ourTeam'])->name('ourTeam');
Route::get('courses',[HomeController::class, 'courses'])->name('courses');
Route::post('courses',[HomeController::class, 'storeCourse'])->name('courses.store');
Route::get('service-detail/{path}',[HomeController::class, 'serviceDetail'])->name('service-detail');
Route::get('sitemap.xml',[HomeController::class, 'sitemap'])->name('sitemap');
Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

// Admin Routeları
Route::prefix('raadmin')->name('admin.')->group(function () {
    // Burada auth middleware-i əlavə etmək tövsiyə olunur: ->middleware('auth')
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blogs.create');
    Route::get('/subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
    Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blogs.store');
});
