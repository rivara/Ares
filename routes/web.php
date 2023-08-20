<?php

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
use App\Http\Controllers\ProductController;


Route::controller(ProductController::class)->group(function () {
    Route::get('/', 'show');
    Route::get('/new', 'new')->name('new');
    Route::get('/create', 'create')->name('create');
    Route::get('/index', 'index')->name('index');
    Route::post('/update','update')->name('update');
    Route::post('/destroy','destroy')->name('destroy');
});
