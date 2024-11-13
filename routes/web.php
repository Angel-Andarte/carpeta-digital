<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

   // Route::get('/dashboard', 'AdminController');

   Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('permission:view-admin');


   Route::view('/test', 'test')->middleware('permission:view-admin');

});
