<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\HocPhanController;
use App\Http\Controllers\DangKyController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', function () {
    return view('home');
})->name('home');

// Đăng nhập và đăng xuất
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Quản lý sinh viên
Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index');
Route::get('/sinhvien/create', [SinhVienController::class, 'create'])->name('sinhvien.create');
Route::post('/sinhvien', [SinhVienController::class, 'store'])->name('sinhvien.store');
Route::get('/sinhvien/{MaSV}', [SinhVienController::class, 'show'])->name('sinhvien.show');
Route::get('/sinhvien/{MaSV}/edit', [SinhVienController::class, 'edit'])->name('sinhvien.edit');
Route::put('/sinhvien/{MaSV}', [SinhVienController::class, 'update'])->name('sinhvien.update');
Route::get('/sinhvien/{MaSV}/delete', [SinhVienController::class, 'confirmDelete'])->name('sinhvien.confirm-delete');
Route::delete('/sinhvien/{MaSV}', [SinhVienController::class, 'destroy'])->name('sinhvien.destroy');

// Quản lý học phần và đăng ký
Route::get('/hocphan', [HocPhanController::class, 'index'])->name('hocphan.index');
Route::post('/hocphan/add-to-cart/{MaHP}', [HocPhanController::class, 'addToCart'])->name('hocphan.add-to-cart')->middleware('auth');
Route::get('/hocphan/cart', [HocPhanController::class, 'cart'])->name('hocphan.cart')->middleware('auth');
Route::post('/hocphan/remove-from-cart/{MaHP}', [HocPhanController::class, 'removeFromCart'])->name('hocphan.remove-from-cart')->middleware('auth');
Route::post('/hocphan/clear-cart', [HocPhanController::class, 'clearCart'])->name('hocphan.clear-cart')->middleware('auth');

// Đăng ký học phần
Route::post('/dangky/save', [DangKyController::class, 'saveRegistration'])->name('dangky.save')->middleware('auth');