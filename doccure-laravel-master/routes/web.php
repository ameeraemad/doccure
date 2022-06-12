<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms')->middleware('guest:admin,doctor,patient')->group(function () {
    Route::view('{guard}/login', 'cms.admin.auth.login')->name('cms.login');
    Route::post('{guard}/login', [AuthController::class, 'login']);

    // Route::view('/register', 'cms.admin.register')->name('admin.register');
    // Route::view('/forgot-password', 'cms.admin.forgot-password')->name('admin.forgot-password');
    // Route::view('/lock-screen', 'cms.admin.lock-screen')->name('admin.lock-screen');
});

Route::prefix('cms')->middleware('auth:admin,doctor,patient')->group(function () {
    Route::get('{guard}/logout', [AuthController::class, 'logout'])->name('cms.logout');
});

Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
    Route::view('/', 'cms.admin.dashboard')->name('admin.dashboard');
    Route::view('/settings', 'cms.admin.settings')->name('admin.settings');
    Route::view('/profile', 'cms.admin.profile')->name('admin.profile');

    Route::resource('admins', UserController::class);
    Route::resource('cities', CityController::class);
    Route::resource('specialities', SpecialityController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('patients', PatientController::class);
});

Route::prefix('cms/doctor')->middleware('auth:doctor')->group(function () {
    Route::view('/', 'cms.doctor.dashboard')->name('doctor.dashboard');
    Route::view('/appointments', 'cms.doctor.appointments')->name('doctor.appointments');
    Route::view('/my-patients', 'cms.doctor.my-patients')->name('doctor.my-patients');
    Route::view('/schedule-timings', 'cms.doctor.schedule-timings')->name('doctor.schedule-timings');
    Route::view('/invoices', 'cms.doctor.invoices')->name('doctor.invoices');
    Route::view('/invoice-view', 'cms.doctor.invoice-view')->name('doctor.invoice-view');
    Route::view('/reviews', 'cms.doctor.reviews')->name('doctor.reviews');
    Route::view('/profile-settings', 'cms.doctor.profile-settings')->name('doctor.profile-settings');
    Route::view('/social-media', 'cms.doctor.social-media')->name('doctor.social-media');
    Route::view('/change-password', 'cms.doctor.change-password')->name('doctor.change-password');
});

Route::prefix('cms/patient')->middleware('auth:patient')->group(function () {
    Route::view('/', 'cms.patient.dashboard')->name('patient.dashboard');
    Route::view('/change-password', 'cms.patient.change-password')->name('patient.change-password');
    Route::view('/profile-settings', 'cms.patient.profile-settings')->name('patient.profile-settings');
    Route::view('/favourites', 'cms.patient.favourites')->name('patient.favourites');
});

Route::prefix('cms/admin')->group(function () {
    Route::view('/appointments', 'cms.admin.others.appointment-list')->name('admin.appointments');
    Route::view('/reviews', 'cms.admin.reviews')->name('admin.reviews');
    Route::view('/transactions', 'cms.admin.transactions')->name('admin.transactions');
    Route::view('/invoice-report', 'cms.admin.invoice-report')->name('admin.invoice-report');

    Route::view('/error-404', 'cms.admin.error-404')->name('admin.error-404');
    Route::view('/error-500', 'cms.admin.error-500')->name('admin.error-500');

    Route::view('/blank', 'cms.admin.temp')->name('admin.blank');

    Route::view('/components', 'cms.admin.components')->name('admin.components');
    Route::view('/tables-basic', 'cms.admin.tables-basic')->name('admin.tables-basic');
    Route::view('/data-tables', 'cms.admin.data-tables')->name('admin.data-tables');

    Route::view('/form-basic-inputs', 'cms.admin.form-basic-inputs')->name('admin.form-basic-inputs');
    Route::view('/form-input-groups', 'cms.admin.form-input-groups')->name('admin.form-input-groups');
    Route::view('/form-horizontal', 'cms.admin.form-horizontal')->name('admin.form-horizontal');
    Route::view('/form-vertical', 'cms.admin.form-vertical')->name('admin.form-vertical');
    Route::view('/form-mask', 'cms.admin.form-mask')->name('admin.form-mask');
    Route::view('/form-validation', 'cms.admin.form-validation')->name('admin.form-validation');
});

Route::fallback(function () {
    return view('cms.error-404');
});

Route::get('test', function () {
    DB::enableQueryLog();
    DB::table('users')
        ->where('first_name', '==', 'Ahmed')
        ->limit(2)
        ->get();
    dd(DB::getQueryLog());
});
