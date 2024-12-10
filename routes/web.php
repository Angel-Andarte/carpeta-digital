<?php

use App\Http\Controllers\AdminController;
use App\Livewire\FormUser;
use App\Livewire\RoleForm;
use App\Livewire\RoleList;
use App\Livewire\UserAdmin;
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

    Route::get('/roles', RoleList::class)->name('role.list');
    Route::get('/roles/create', RoleForm::class)->name('role.create');
    Route::get('/roles/edit/{roleId}', RoleForm::class)->name('role.edit');
    Route::get('/admin/usuarios', UserAdmin::class)->name('admin.usuarios');
    Route::get('/admin/usuarios/create', FormUser::class)->name('admin.usuarios.create');


});
