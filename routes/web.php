<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LandingPageController,
    AuthenticationController,
    AdminController,
    GeneralController,
    RecruiterController,
    ApplicantController,
};
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

Route::get('/', [LandingPageController::class, 'landingPage'])->name('landing.page');
Route::get('/auth/login', [AuthenticationController::class, 'showLoginPage'])->name('auth.login.page');
Route::post('/auth/process/login', [AuthenticationController::class, 'storeLoginProcess'])->name('auth.process.login');
Route::get('/auth/register', [AuthenticationController::class, 'showRegisterPage'])->name('auth.register.page');
Route::post('/auth/process/register', [AuthenticationController::class, 'storeRegisterProcess'])->name('auth.register.process');
Route::get('/auth/process/logout', [AuthenticationController::class, 'logout'])->name('logout.process');

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
        Route::get('/manage/user', 'showManageUser')->name('manage.user.page');
        Route::get('/add/user', 'showAddUser')->name('add.user.page');
        Route::post('/create/user', 'createUser')->name('create.user.process');
    }); 
    Route::prefix('/general')->name('general.')->controller(GeneralController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
    });
    Route::prefix('/recruiter')->name('recruiter.')->controller(RecruiterController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
    });
    Route::prefix('/applicant')->name('applicant.')->controller(ApplicantController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
        Route::get('/lamaran', 'showLamaranPage')->name('lamaran.page');
        Route::get('/status/lamaran', 'showStatusPage')->name('status.page');
        Route::post('/store/data/lamaran', 'storeLamaran')->name('store.lamaran.process');
    });
});
