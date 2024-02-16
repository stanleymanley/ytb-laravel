<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\WidgetImageSliderController;
use App\Http\Controllers\Portal\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'indexPage')->name('login');
    Route::get('/login', 'indexPage');
    Route::post('/login', 'signin');
});

Route::group(['middleware' => ['auth'] ], function () {

    Route::controller(AccountController::class)->group(function () {
        Route::get('/account/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'indexPage');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/users', 'indexPage');
        Route::get('/users/list', 'list');
        Route::get('/users/add', 'addPage');
        Route::post('/users/add', 'add');
        Route::get('/users/update/{id}', 'editPage');
        Route::post('/users/update/{id}', 'edit');
        Route::post('/users/remove/{id}', 'remove');
    });

    Route::controller(ContentController::class)->group(function () {
        Route::get('/content', 'indexPage');
        Route::get('/content/list', 'list');
        Route::get('/content/add', 'addPage');
        Route::post('/content/add', 'add');
        Route::get('/content/update/{id}', 'editPage');
        Route::post('/content/update/{id}', 'edit');
        Route::post('/content/remove/{id}', 'remove');
    });

    Route::controller(WidgetImageSliderController::class)->group(function () {
        Route::get('/widget-image-slider', 'indexPage');
        Route::get('/widget-image-slider/list', 'list');
        Route::get('/widget-image-slider/add', 'addPage');
        Route::post('/widget-image-slider/add', 'add');
        Route::get('/widget-image-slider/update/{id}', 'editPage');
        Route::post('/widget-image-slider/update/{id}', 'edit');
        Route::post('/widget-image-slider/remove/{id}', 'remove');
    });

});
