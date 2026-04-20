<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;

// Route điều hướng đến Google/Facebook
Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirect']);

// Route xử lý dữ liệu trả về (Callback)
Route::get('/auth/{provider}/callback', [SocialController::class, 'callback']);

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');