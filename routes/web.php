<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\CheckTimeAccess;

// Route 1: Login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route 2: Home page
Route::get('/', function () {
    return view('home');
});

// Route Group for Products (gom nhóm "/product")
Route::prefix('product')->group(function () {
    Route::controller(ProductController::class)->group(function () {    
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/add', [ProductController::class, 'create'])->name('product.add');
        Route::get('/detail/{id}', [ProductController::class, 'getDetail'])->name('product.detail');
    });
});

// Route 6: Student information page
Route::get('/sinhvien/{name}/{mssv}', function ($name, $mssv) {
    return view('sinhvien', [
        'name' => $name,
        'mssv' => $mssv
    ]);
});

// Route 7: Multiplication table (Bảng cửu chương)
Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

// 404 Error handling - Laravel automatically shows errors/404.blade.php
// when a route is not found (khi không tìm thấy route)
