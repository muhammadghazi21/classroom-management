<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\BranchFacultyController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfesorHasSubjectController;
use App\Http\Controllers\SubjectController;
use App\Models\Branch;
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

// Dashboard
Route::get('/', [DashboardController::class, 'login_page'])->name('auth-login');
Route::post('/login-auth', [DashboardController::class, 'login_auth'])->name('login-auth');

Route::group(['middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard-general',  [DashboardController::class, 'index'])->name('dashboard-general');
});
Route::get('/detail-faculty',  [FacultyController::class, 'index'])->name('detail-faculty');
Route::post('/add-detail-faculty',  [FacultyController::class, 'store'])->name('add-detail-faculty');
Route::get('/edit-detail-faculty/{id}', [FacultyController::class, 'edit'])->name('edit-detail-faculty');
Route::put('/update-detail-faculty/{id}',  [FacultyController::class, 'update'])->name('update-detail-faculty');
Route::delete('/delete-detail-faculty/{id}',  [FacultyController::class, 'delete'])->name('delete-detail-faculty');

Route::get('/detail-branch',  [BranchController::class, 'index'])->name('detail-branch');
Route::post('/add-detail-branch',  [BranchController::class, 'store'])->name('add-detail-branch');
Route::get('/edit-detail-branch/{id}', [BranchController::class, 'edit'])->name('edit-detail-branch');
Route::put('/update-detail-branch/{id}',  [BranchController::class, 'update'])->name('update-detail-branch');
Route::delete('/delete-detail-branch/{id}',  [BranchController::class, 'delete'])->name('delete-detail-branch');

Route::get('/detail-branch-faculty',  [BranchFacultyController::class, 'index'])->name('detail-branch-faculty');
Route::post('/add-detail-branch-faculty',  [BranchFacultyController::class, 'store'])->name('add-detail-branch-faculty');
Route::get('/edit-detail-branch-faculty/{id}', [BranchFacultyController::class, 'edit'])->name('edit-detail-branch-faculty');
Route::put('/update-detail-branch-faculty/{id}',  [BranchFacultyController::class, 'update'])->name('update-detail-branch-faculty');
Route::delete('/delete-detail-branch-faculty/{id}',  [BranchFacultyController::class, 'delete'])->name('delete-detail-branch-faculty');

Route::get('/detail-building',  [BuildingController::class, 'index'])->name('detail-building');
Route::post('/add-detail-building',  [BuildingController::class, 'store'])->name('add-detail-building');
Route::get('/edit-detail-building/{id}', [BuildingController::class, 'edit'])->name('edit-detail-building');
Route::put('/update-detail-building/{id}',  [BuildingController::class, 'update'])->name('update-detail-building');
Route::delete('/delete-detail-building/{id}',  [BuildingController::class, 'delete'])->name('delete-detail-building');

Route::get('/detail-facility',  [FacilityController::class, 'index'])->name('detail-facility');
Route::post('/add-detail-facility',  [FacilityController::class, 'store'])->name('add-detail-facility');
Route::delete('/delete-detail-facility/{id}',  [FacilityController::class, 'delete'])->name('delete-detail-facility');

Route::get('/detail-subject',  [SubjectController::class, 'index'])->name('detail-subject');
Route::post('/add-detail-subject',  [SubjectController::class, 'store'])->name('add-detail-subject');
Route::get('/edit-detail-subject/{id}', [SubjectController::class, 'edit'])->name('edit-detail-subject');
Route::put('/update-detail-subject/{id}',  [SubjectController::class, 'update'])->name('update-detail-subject');
Route::delete('/delete-detail-subject/{id}',  [SubjectController::class, 'delete'])->name('delete-detail-subject');

Route::get('/detail-classroom',  [ClassroomController::class, 'index'])->name('detail-classroom');
Route::post('/add-detail-classroom',  [ClassroomController::class, 'store'])->name('add-detail-classroom');
Route::get('/edit-detail-classroom/{id}', [ClassroomController::class, 'edit'])->name('edit-detail-classroom');
Route::put('/update-detail-classroom/{id}',  [ClassroomController::class, 'update'])->name('update-detail-classroom');
Route::delete('/delete-detail-classroom/{id}',  [ClassroomController::class, 'delete'])->name('delete-detail-classroom');

Route::get('/detail-department',  [DepartmentController::class, 'index'])->name('detail-department');
Route::post('/add-detail-department',  [DepartmentController::class, 'store'])->name('add-detail-department');
Route::get('/edit-detail-department/{id}', [DepartmentController::class, 'edit'])->name('edit-detail-department');
Route::put('update-detail-department/{id}', [DepartmentController::class, 'update'])->name('update-detail-department');
Route::delete('/delete-detail-department/{id}',  [DepartmentController::class, 'delete'])->name('delete-detail-department');

Route::get('/detail-profesor-has-subject',  [ProfesorHasSubjectController::class, 'index'])->name('detail-profesor-has-subject');
Route::post('/add-detail-profesor-has-subject',  [ProfesorHasSubjectController::class, 'store'])->name('add-detail-profesor-has-subject');
Route::get('/edit-detail-profesor-has-subject/{id}', [ProfesorHasSubjectController::class, 'edit'])->name('edit-detail-profesor-has-subject');
Route::put('/update-detail-profesor-has-subject/{id}',  [ProfesorHasSubjectController::class, 'update'])->name('update-detail-profesor-has-subject');
Route::delete('/delete-detail-profesor-has-subject/{id}',  [ProfesorHasSubjectController::class, 'delete'])->name('delete-detail-profesor-has-subject');

Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});


// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});


// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// google maps
// belum tersedia

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});
Route::get('/modules-datatables', function () {
    return view('pages.modules-datatables', ['type_menu' => 'modules']);
});
Route::get('/modules-flag', function () {
    return view('pages.modules-flag', ['type_menu' => 'modules']);
});
Route::get('/modules-font-awesome', function () {
    return view('pages.modules-font-awesome', ['type_menu' => 'modules']);
});
Route::get('/modules-ion-icons', function () {
    return view('pages.modules-ion-icons', ['type_menu' => 'modules']);
});
Route::get('/modules-owl-carousel', function () {
    return view('pages.modules-owl-carousel', ['type_menu' => 'modules']);
});
Route::get('/modules-sparkline', function () {
    return view('pages.modules-sparkline', ['type_menu' => 'modules']);
});
Route::get('/modules-sweet-alert', function () {
    return view('pages.modules-sweet-alert', ['type_menu' => 'modules']);
});
Route::get('/modules-toastr', function () {
    return view('pages.modules-toastr', ['type_menu' => 'modules']);
});
Route::get('/modules-vector-map', function () {
    return view('pages.modules-vector-map', ['type_menu' => 'modules']);
});
Route::get('/modules-weather-icon', function () {
    return view('pages.modules-weather-icon', ['type_menu' => 'modules']);
});

// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});

// error
Route::get('/error-403', function () {
    return view('pages.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.error-503', ['type_menu' => 'error']);
});

// features
Route::get('/features-activities', function () {
    return view('pages.features-activities', ['type_menu' => 'features']);
});
Route::get('/features-post-create', function () {
    return view('pages.features-post-create', ['type_menu' => 'features']);
});
Route::get('/features-post', function () {
    return view('pages.features-post', ['type_menu' => 'features']);
});
Route::get('/features-profile', function () {
    return view('pages.features-profile', ['type_menu' => 'features']);
});
Route::get('/features-settings', function () {
    return view('pages.features-settings', ['type_menu' => 'features']);
});
Route::get('/features-setting-detail', function () {
    return view('pages.features-setting-detail', ['type_menu' => 'features']);
});
Route::get('/features-tickets', function () {
    return view('pages.features-tickets', ['type_menu' => 'features']);
});

// utilities
Route::get('/utilities-contact', function () {
    return view('pages.utilities-contact', ['type_menu' => 'utilities']);
});
Route::get('/utilities-invoice', function () {
    return view('pages.utilities-invoice', ['type_menu' => 'utilities']);
});
Route::get('/utilities-subscribe', function () {
    return view('pages.utilities-subscribe', ['type_menu' => 'utilities']);
});

// credits
Route::get('/credits', function () {
    return view('pages.credits', ['type_menu' => '']);
});

Route::get('/branch', function () {
    return Branch::with('faculties')->get();
});
