<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if(Auth::check()) {
        return redirect('/profile');
    }else{
        return view('auth');
    }
});
Route::get('/admin-login', function () {
    if(Auth::guard('admin')->check()) {
        return redirect('/dashboard');
    }else{
        return view('admin-login');
    }
});


Route::get('/dashboard' , [AuthController::class , 'dashboard']);
Route::get('/profile' , [AuthController::class , 'profile']);
Route::get('/logout' , [AuthController::class , 'logout']);
Route::post('/register' , [AuthController::class, 'register']);
Route::post('/login' , [AuthController::class, 'login']);
Route::post('/admin-login' , [AuthController::class, 'adminLogin']);