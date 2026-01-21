<?php

use Illuminate\Support\Facades\Route;

// Route 1: Home page
Route::get('/', function () {
    return view('home');
});

// Route Group for Products (gom nhóm "/product")
Route::prefix('product')->group(function () {
    
    // Route 2: Product list page with sample product
    Route::get('/', function () {
        return view('product.index');
    })->name('product.index');  // Named route example (ví dụ đặt tên route)
    
    // Route 3: Add new product page with form
    Route::get('/add', function () {
        return view('product.add');
    })->name('product.add');  // Named route example (gọi route qua tên)
    
    // Route 4: Product detail with ID parameter (default value 123)
    Route::get('/{id}', function ($id = '123') {
        return "Product ID: " . $id;
    });
});

// Route 5: Student information page
Route::get('/sinhvien/{name}/{mssv}', function ($name, $mssv) {
    return view('sinhvien', [
        'name' => $name,
        'mssv' => $mssv
    ]);
});

// Route 6: Multiplication table (Bảng cửu chương)
Route::get('/banco/{n}', function ($n) {
    return view('banco', ['n' => $n]);
});

// 404 Error handling - Laravel automatically shows errors/404.blade.php
// when a route is not found (khi không tìm thấy route)
