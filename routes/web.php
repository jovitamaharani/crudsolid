<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\EkstraController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::resource('student', StudentController::class);
    Route::resource('about', AboutController::class);
    Route::resource('classroom', ClassroomController::class);
    Route::resource('ekstra', EkstraController::class);

