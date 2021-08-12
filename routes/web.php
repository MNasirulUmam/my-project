<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\DepartementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/main', function () {
    return view('layouts/main');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/company', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
    
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
        //Company
        Route::resource('admin/company', CompanieController::class);
        Route::get('company/trash',	   [App\Http\Controllers\CompanieController::class, 'getDeleteCompanie'])->name('company.trash');
        Route::get('company/restore/{id}',[App\Http\Controllers\CompanieController::class, 'restore'])->name('company.restore');
        Route::get('company/restore-all', [App\Http\Controllers\CompanieController::class, 'restoreAll'])->name('company.restoreAll');
        Route::get('company/delete/{id}', [App\Http\Controllers\CompanieController::class, 'deletePermanent'])->name('company.deletePermanent');
        Route::get('company/delete-all',  [App\Http\Controllers\CompanieController::class, 'deleteAll'])->name('company.deleteAll');
        //Departement
        Route::resource('admin/departement', DepartementController::class);
        Route::get('departement/trash',	   [App\Http\Controllers\DepartementController::class, 'getDeleteDepartement'])->name('departement.trash');
        Route::get('departement/restore/{id}',[App\Http\Controllers\DepartementController::class, 'restore'])->name('departement.restore');
        Route::get('departement/restore-all', [App\Http\Controllers\DepartementController::class, 'restoreAll'])->name('departement.restoreAll');
        Route::get('departement/delete/{id}', [App\Http\Controllers\DepartementController::class, 'deletePermanent'])->name('departement.deletePermanent');
        Route::get('departement/delete-all',  [App\Http\Controllers\DepartementController::class, 'deleteAll'])->name('departement.deleteAll');
        //Users
        Route::resource('admin/users', UserController::class);
        Route::get('users/trash',	   [App\Http\Controllers\UserController::class, 'getDeleteUser'])->name('users.trash');
        Route::get('users/restore/{id}',[App\Http\Controllers\UserController::class, 'restore'])->name('users.restore');
        Route::get('users/restore-all', [App\Http\Controllers\UserController::class, 'restoreAll'])->name('users.restoreAll');
        Route::get('users/delete/{id}', [App\Http\Controllers\UserController::class, 'deletePermanent'])->name('users.deletePermanent');
        Route::get('users/delete-all',  [App\Http\Controllers\UserController::class, 'deleteAll'])->name('users.deleteAll');
    
    });
 
    Route::middleware(['user'])->group(function () {
        Route::get('user', [UserController::class, 'index']);
        
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/');
    });
 
});
