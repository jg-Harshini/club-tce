<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClubAdminController;
use App\Http\Controllers\EnrollmentController;


Route::get('/export/excel', [EnrollmentController::class, 'exportExcel'])->name('export.excel');
Route::get('/export/pdf', [EnrollmentController::class, 'exportPDF'])->name('export.pdf');

/*
|--------------------------------------------------------------------------
| ROOT REDIRECT OR HOME PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| SUPERADMIN ROUTES (Protected by auth)
|--------------------------------------------------------------------------
*/
Route::prefix('tce/superadmin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');

    Route::match(['get', 'post'], '/clubs/{action?}/{id?}', [SuperadminController::class, 'clubs'])->name('superadmin.clubs');
    Route::match(['get', 'post'], '/events/{action?}/{id?}', [SuperadminController::class, 'events'])->name('superadmin.events');
    Route::match(['get', 'post'], '/faculties/{action?}/{id?}', [SuperadminController::class, 'faculties'])->name('superadmin.faculties');
    Route::match(['get', 'post'], '/students/{action?}/{id?}', [SuperadminController::class, 'students'])->name('superadmin.students');
Route::get('/events/view/{id}', [SuperadminController::class, 'viewEvent'])->name('superadmin.events.view');

    Route::get('/enrollments', [SuperadminController::class, 'enrollments'])->name('superadmin.enrollments');
});

/*
|--------------------------------------------------------------------------
| STUDENT ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('tce/student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/events', [StudentController::class, 'events'])->name('student.events');
    Route::get('/enroll', [StudentController::class, 'showEnrollForm'])->name('student.enroll.form');
    Route::post('/enroll', [StudentController::class, 'enroll'])->name('student.enroll.submit');
    Route::get('/clubs', [StudentController::class, 'showAllClubs'])->name('student.clubs.all');
    Route::get('/clubs/{id}', [StudentController::class, 'viewClubDetails'])->name('student.clubs.show');
    Route::get('/events/{id}', [StudentController::class, 'showEventDetails'])->name('student.event.details');
    Route::get('/commitee', [StudentController::class, 'committee'])->name('student.commitee');
});

/*
|--------------------------------------------------------------------------
| CLUB ADMIN ROUTES (OPTIONAL)
|--------------------------------------------------------------------------
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/clubadmin/dashboard', [ClubAdminController::class, 'dashboard'])->name('clubadmin.dashboard');
    Route::get('/clubadmin/profile', [ClubAdminController::class, 'profile'])->name('clubadmin.profile');
    Route::match(['get', 'post'], '/clubadmin/events/{action?}/{id?}', [ClubAdminController::class, 'events'])->name('clubadmin.events');
});

Route::get('/superadmin/events/print/{id}', [SuperadminController::class, 'printReport'])->name('superadmin.events.print');
