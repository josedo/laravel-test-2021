<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DailyMeetingController;
use App\Http\Controllers\ShippingController;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('shippings', ShippingController::class);
    Route::post('/processShipping', [ShippingController::class, 'store'])->name('processShipping');

    Route::get('/dailyMeeting', [DailyMeetingController::class, 'index'])->name('dailyMeeting');
});
