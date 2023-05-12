<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
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

Route::get('/', function (Request $request) {
    $introducer = $request->introducer;
    return view('home', compact('introducer'));
});

Route::get('/advertising', function() {
    return view('advertising');
});

Route::get('/distrobuter', function () {
    return view('distrobuter');
});

Route::resource('/members', MemberController::class);

Route::resource('/resellers', ResellerController::class);

Route::resource('/distrobuters', DistrobuterController::class);

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])
     ->name('orders.index');

Route::get('/orders/{order}', [App\Http\Controllers\OrderController::class, 'show'])
     ->name('orders.show');

Route::match(array('get','post'),'/suntechpayment/receive', [App\Http\Controllers\SunTechController::class, 'receive'])
     ->name('suntechpayment.receive');

Route::match(array('get','post'),'/suntechpayment/paid', [App\Http\Controllers\SunTechController::class, 'paid'])
     ->name('suntechpayment.paid');

