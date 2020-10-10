<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MediaController::class, 'getProviders']);
Route::get('get-providers', [MediaController::class, 'getProviders']);
Route::post('upload', [MediaController::class, 'upload']);
Route::get('getUploads', [MediaController::class, 'getUploads']);
