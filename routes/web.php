<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    LandingPageController,
    AuthenticationController,
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
    Route::prefix('/general')->name('general.')->controller(GeneralController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
        Route::get('/general/detail/applicant/{id}', 'detailApplicant')->name('detail.applicant.page');
    });
    Route::prefix('/recruiter')->name('recruiter.')->controller(RecruiterController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
        Route::get('/list/data/applicant', 'showApplicantDataPage')->name('applicant.data.page');
        Route::get('/list/history/applicant', 'showApplicantHistoryPage')->name('applicant.history.page');
        Route::get('/list/manage/user', 'showManageUserPage')->name('manage.user.page');
        Route::get('/create/user', 'showCreateUserPage')->name('create.user.page');
        Route::get('/edit/user/{id}', 'showEditUserPage')->name('edit.user.page');
        Route::get('/edit/schedule/{id}', 'showSchedulePage')->name('schedule.page');
        Route::get('/modal/approval/{application}', 'modalApproval')->name('ajax.modal.approval');
        Route::get('/delete/user/{id}', 'deleteUserProcess')->name('delete.user');
        Route::get('/detail/data/applicant/{id}', 'showDetailDataApplicant')->name('detail.data.applicant');
        Route::post('/create/user/process', 'storeUserProcess')->name('store.user');
        Route::post('/update/user/process', 'updateUserProcess')->name('update.user');
        Route::post('/update/approval', 'updateApproval')->name('update.approval');
        Route::post('/update/schedule', 'updateSchedule')->name('update.schedule');
    });
    Route::prefix('/applicant')->name('applicant.')->controller(ApplicantController::class)->group(function () {
        Route::get('/index', 'showIndexPage')->name('index.page');
        Route::get('/lamaran', 'showLamaranPage')->name('lamaran.page');
        Route::get('/status/lamaran', 'showStatusPage')->name('status.page');
        Route::post('/store/data/lamaran', 'storeLamaran')->name('store.lamaran.process');
    });
});
