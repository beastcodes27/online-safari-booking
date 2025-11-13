<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BusController;
use App\Http\Controllers\Admin\RouteController as AdminRouteController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\BookingController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('my-bookings', [BookingController::class, 'myBookings'])->name('bookings.my');
    Route::resource('bookings', BookingController::class);
});

Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('buses', BusController::class);
    Route::resource('routes', AdminRouteController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('bookings', AdminBookingController::class);
});
