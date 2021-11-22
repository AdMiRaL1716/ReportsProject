<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::group(['middleware' => ['role:admin']], function () {
    //Actions with Users
    Route::get('/users-roles', [App\Http\Controllers\RoleController::class, 'getAllUsers'])->name('users-roles');
    Route::get('/edit-role/{id}', [App\Http\Controllers\RoleController::class, 'editRole'])->name('edit-role/{id}');
    Route::post('/edit-role/{id}', [App\Http\Controllers\RoleController::class, 'updateRole'])->name('edit-role/{id}');
    //Actions with Customers
    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'customers'])->name('customers');
    Route::get('/add-customer', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->name('add-customer');
    Route::post('/new-customer', [App\Http\Controllers\CustomerController::class, 'create'])->name('new-customer');
    Route::get('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'editCustomer'])->name('edit-customer/{id}');
    Route::post('/edit-customer/{id}', [App\Http\Controllers\CustomerController::class, 'update'])->name('edit-customer/{id}');
    Route::post('/delete-customer/{id}', [App\Http\Controllers\CustomerController::class, 'delete'])->name('delete-customer/{id}');
    //Actions with Elements
    Route::get('/elements', [App\Http\Controllers\ElementController::class, 'elements'])->name('elements');
    Route::get('/add-element', [App\Http\Controllers\ElementController::class, 'addElement'])->name('add-element');
    Route::post('/new-element', [App\Http\Controllers\ElementController::class, 'create'])->name('new-element');
    Route::get('/edit-element/{id}', [App\Http\Controllers\ElementController::class, 'editElement'])->name('edit-element/{id}');
    Route::post('/edit-element/{id}', [App\Http\Controllers\ElementController::class, 'update'])->name('edit-element/{id}');
    Route::post('/delete-element/{id}', [App\Http\Controllers\ElementController::class, 'delete'])->name('delete-element/{id}');
    //Actions with Units
    Route::get('/units', [App\Http\Controllers\UnitController::class, 'units'])->name('units');
    Route::get('/add-unit', [App\Http\Controllers\UnitController::class, 'addUnit'])->name('add-unit');
    Route::post('/new-unit', [App\Http\Controllers\UnitController::class, 'create'])->name('new-unit');
    Route::get('/edit-unit/{id}', [App\Http\Controllers\UnitController::class, 'editUnit'])->name('edit-unit/{id}');
    Route::post('/edit-unit/{id}', [App\Http\Controllers\UnitController::class, 'update'])->name('edit-unit/{id}');
    Route::post('/delete-unit/{id}', [App\Http\Controllers\UnitController::class, 'delete'])->name('delete-unit/{id}');
    //Actions with Methods
    Route::get('/methods', [App\Http\Controllers\MethodController::class, 'methods'])->name('methods');
    Route::get('/add-method', [App\Http\Controllers\MethodController::class, 'addMethod'])->name('add-method');
    Route::post('/new-method', [App\Http\Controllers\MethodController::class, 'create'])->name('new-method');
    Route::get('/edit-method/{id}', [App\Http\Controllers\MethodController::class, 'editMethod'])->name('edit-method/{id}');
    Route::post('/edit-method/{id}', [App\Http\Controllers\MethodController::class, 'update'])->name('edit-method/{id}');
    Route::post('/delete-method/{id}', [App\Http\Controllers\MethodController::class, 'delete'])->name('delete-method/{id}');
});

Route::group(['middleware' => ['role:support|admin']], function () {
    //Actions with Settings
    Route::get('/customs', [App\Http\Controllers\SettingController::class, 'settings'])->name('customs');
    Route::get('/change-password', [App\Http\Controllers\SettingController::class, 'password'])->name('change-password');
    Route::get('/change-username', [App\Http\Controllers\SettingController::class, 'userName'])->name('change-username');
    Route::get('/change-email', [App\Http\Controllers\SettingController::class, 'email'])->name('change-email');
    Route::post('/update-password/{id}', [App\Http\Controllers\SettingController::class, 'changePassword'])->name('update-password/{id}');
    Route::post('/update-username/{id}', [App\Http\Controllers\SettingController::class, 'changeUserName'])->name('update-username/{id}');
    Route::post('/update-email/{id}', [App\Http\Controllers\SettingController::class, 'changeEmail'])->name('update-email/{id}');
    //Actions with Tests
    Route::get('/tests', [App\Http\Controllers\TestController::class, 'tests'])->name('tests');
    Route::get('/add-test', [App\Http\Controllers\TestController::class, 'addTest'])->name('add-test');
    Route::post('/new-test', [App\Http\Controllers\TestController::class, 'create'])->name('new-test');
    Route::get('/edit-test/{id}', [App\Http\Controllers\TestController::class, 'editTest'])->name('edit-test/{id}');
    Route::post('/edit-test/{id}', [App\Http\Controllers\TestController::class, 'update'])->name('edit-test/{id}');
    Route::post('/delete-test/{id}', [App\Http\Controllers\TestController::class, 'delete'])->name('delete-test/{id}');
    //Actions with Reports
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'reports'])->name('reports');
    Route::get('/add-report', [App\Http\Controllers\ReportController::class, 'addReport'])->name('add-report');
    Route::post('/new-report', [App\Http\Controllers\ReportController::class, 'create'])->name('new-report');
    Route::post('/delete-report/{id}', [App\Http\Controllers\ReportController::class, 'delete'])->name('delete-report/{id}');
    Route::post('/new-pdf/{id}', [App\Http\Controllers\ReportController::class, 'createPDF'])->name('new-pdf/{id}');
    //Search
    Route::get('/search/', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
});

Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'language'])->name('locale');
