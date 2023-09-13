<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landingpage');
})->middleware('web');

// == Authentikasi Route ==
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'authtentication'])->name('loginauth');
Route::get('/buatakun', [AuthController::class, 'register'])->middleware('guest');
Route::post('/buatakun', [AuthController::class, 'pembuatan'])->name('pembuatanakun');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/home', function() {
    if(Auth::user()->role == 'guest'){
        return redirect('dashboard/guest');
    }elseif(Auth::user()->role == 'admin'){
        return redirect()->url('dashboard/admin');
    }elseif(Auth::user()->role == 'operator'){
        return redirect()->url('dashboard/operator');
    }else{
        return redirect('login');
    }
});
