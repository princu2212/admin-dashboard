<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('new', 'users.newtable');

Route::get('/', [EmployeeController::class, 'login']);
Route::get('/table', [EmployeeController::class, 'index'])->name('table');
Route::post('/store', [EmployeeController::class, 'store'])->name('store');
Route::get('/edit{id}', [EmployeeController::class, 'edit'])->name('edit');
Route::put('/update{id}', [EmployeeController::class, 'update'])->name('update');
Route::delete('/destroy{id}', [EmployeeController::class, 'destroy'])->name('destroy');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
