<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SearchingController;

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


Route::get('/dangnhap',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'register']);
Route::post('/register', [AuthController::class, 'signup']);

Route::post('login',[AuthController::class,'Authologin']);
Route::get('admin/addAdmin',[AdminController::class,'add']);
Route::post('admin/addAdmin',[AdminController::class,'insert']);
Route::get('admin/list',[AdminController::class,'list']);
Route::get('admin/editAdmin/{id}',[AdminController::class,'edit']);
Route::get('admin/deleteAdmin/{id}',[AdminController::class,'delete']);
Route::post('admin/editAdmin/{id}',[AdminController::class,'update']);
Route::get('customer/list',[CustomerController::class,'list']);
Route::get('customer/delete/{Cus_ID}',[CustomerController::class,'delete']);
Route::get('customer/edit/{id}',[CustomerController::class,'edit']);
Route::post('customer/edit/{id}',[CustomerController::class,'update']);
Route::get('room/delete/{id}',[RoomController::class,'delete']);

Route::get('room/add',[RoomController::class,'add']);
Route::post('room/add',[RoomController::class,'insert']);

Route::get('room/list',[RoomController::class,'list']);
Route::get('room/edit/{id}',[RoomController::class,'edit']);
Route::post('room/edit/{id}',[RoomController::class,'update']);

Route::get('admin/dashbaord', function () {
    return view('admin.dashbaord');
});
Route::get('/', [CustomerHomeController::class, 'index'])->name('home');
Route::get('detailRoom/{id}',[RoomController::class,'detailRoom']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home/booking/{id}', [BookingController::class, 'showBookingForm'])->name('showBookingForm');
Route::post('/home/booking/create-booking/{id}', [BookingController::class, 'createBooking'])->name('createBooking');
Route::get('/searchRoom',[SearchingController::class, 'search'])->name('search');




