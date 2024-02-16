<?php

use App\Http\Controllers\Portal\ContentController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'indexPage');
});

Route::controller(ContentController::class)->group(function () {
    Route::get('/artikel', 'indexPage');
    Route::get('/artikel/detail/{id}', 'detailPage');
});
