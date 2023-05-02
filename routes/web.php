<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\DistrobuterController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/distrobuter', function () {
    return view('distrobuter');
});

Route::resource('/members', MemberController::class);

Route::resource('/resellers', ResellerController::class);

Route::resource('/distrobuters', DistrobuterController::class);
