<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('Admin.Dashboard');
Route::get('/registrasi', [AuthController::class, 'regis'])->name('Auth.Regis');
