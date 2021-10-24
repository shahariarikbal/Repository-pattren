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

Route::get('/', [\App\Http\Controllers\RepositoryController::class, 'index']);
Route::post('/store', [\App\Http\Controllers\RepositoryController::class, 'storeOrUpdate']);
Route::get('/view/{id}', [\App\Http\Controllers\RepositoryController::class, 'view']);
Route::put('/update/{id}', [\App\Http\Controllers\RepositoryController::class, 'storeOrUpdate']);
Route::get('/delete/{id}', [\App\Http\Controllers\RepositoryController::class, 'delete']);
