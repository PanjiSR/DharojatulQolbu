<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminProgramController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'content' => 'home/home/index'
    ];
    return view('home.layouts.wrapper', $data);
});

Route::get('/program', function () {
    $data = [
        'content' => 'home/program/index'
    ];
    return view('home.layouts.wrapper', $data);
});

Route::get('/gallery', function () {
    $data = [
        'content' => 'home/gallery/index'
    ];
    return view('home.layouts.wrapper', $data);
});


Route::get('/contact', function () {
    $data = [
        'content' => 'home/contact/index'
    ];
    return view('home.layouts.wrapper', $data);
});


Route::get('/profile', function () {
    $data = [
        'content' => 'home/profile/index'
    ];
    return view('home.layouts.wrapper', $data);
});

Route::get('/login', [AdminAuthController::class, 'index'])->name('login');
Route::post('/login/do', [AdminAuthController::class, 'doLogin']);

// ===== Admin Route ===== //
Route::prefix('/admin')->middleware('auth')->group(function () {

    Route::get('logout', [AdminAuthController::class, 'logout']);

    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin/dashboard/index'
        ];
        return view('admin.layouts.wrapper', $data);
    });
    Route::resource('/user', AdminUserController::class);

    Route::resource('/posts/program', AdminProgramController::class);
    Route::resource('/gallery', AdminGalleryController::class);
});