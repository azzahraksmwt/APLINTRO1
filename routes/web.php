<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UsageController;
use App\Http\Controllers\LoginController;
//use App\Models\Inventory;

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
    return view('layouts.main');
});


//route login & logout
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//route setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');


    Route::get('/profile', function () {
        return view('profile');
    });

    // ROUTE UNTUK ADMIN
    Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
        //ROUTE LECTURERS
        Route::get('/users/lecturers', [UserController::class, 'index_lecturers'])->name('users.index_lecturers');
        Route::get('/users/lecturers/create', [UserController::class, 'create_lecturers'])->name('users.create_lecturers');
        Route::post('/users/lecturers', [UserController::class, 'store_lecturers'])->name('users.store_lecturers');
        Route::put('/users/lecturers/{id}', [UserController::class, 'update_lecturers'])->name('users.update_lecturers');
        Route::get('/users/lecturers/{id}', [UserController::class, 'show_lecturers'])->name('users.show_lecturers');
        Route::get('/users/lecturers/{id}/edit_lecturers', [UserController::class, 'edit_lecturers'])->name('users.edit_lecturers');
        Route::delete('/users/lecturers/{id}', [UserController::class, 'destroy_lecturers'])->name('users.destroy_lecturers');
        //ROUTE STUDENTS
        Route::get('/users/students', [UserController::class, 'index_students'])->name('users.index_students');
        Route::get('/users/students/create', [UserController::class, 'create_students'])->name('users.create_students');
        Route::post('/users/students', [UserController::class, 'store_students'])->name('users.store_students');
        Route::put('/users/students/{id}', [UserController::class, 'update_students'])->name('users.update_students');
        Route::get('/users/students/{id}', [UserController::class, 'show_students'])->name('users.show_students');
        Route::get('/users/students/{id}/edit_students', [UserController::class, 'edit_students'])->name('users.edit_students');
        Route::delete('/users/students/{id}', [UserController::class, 'destroy_students'])->name('users.destroy_students');
        //ROUTE INVENTORYS
        Route::get('/admin/inventorys', [InventoryController::class, 'index_admin'])->name('inventorys.index_admin');
        Route::get('/admin/inventorys/add', [InventoryController::class, 'create_admin'])->name('inventorys.create_admin');
        Route::post('/admin/inventorys/store', [InventoryController::class, 'store_admin'])->name('inventorys.store_admin');
        Route::put('/admin/inventorys/{id}', [InventoryController::class, 'update_admin'])->name('inventorys.update_admin');
        Route::get('/admin/inventorys/{id}', [InventoryController::class, 'show_admin'])->name('inventorys.show_admin');
        Route::get('/admin/inventorys/{id}', [InventoryController::class, 'edit_admin'])->name('inventorys.edit_admin');
        Route::delete('/admin/inventorys/{id}', [InventoryController::class, 'destroy_admin'])->name('inventorys.destroy_admin');
        // ROUTE USAGE 
        Route::get('/usages', [UsageController::class, 'index'])->name('usages.index');
        Route::get('/usages/create', [UsageController::class, 'create'])->name('usages.create');
        Route::post('/usages/store', [UsageController::class, 'store'])->name('usages.store');
        Route::get('/usages/{usage}', [UsageController::class, 'show'])->name('usages.show');
        Route::get('/usages/{usage}/edit', [UsageController::class, 'edit'])->name('usages.edit');
        Route::put('/usages/{usage}', [UsageController::class, 'update'])->name('usages.update');
        Route::delete('/usages/{usage}', [UsageController::class, 'destroy'])->name('usages.destroy');

        Route::get('/usages_validation', [UsageController::class, 'index_validation'])->name('usages.index_validation');
        Route::get('/usages_validation/{usage}', [UsageController::class, 'show_validation'])->name('usages_validation.show');
    });

    // ROUTE UNTUK DOSEN
    Route::middleware(['auth', 'checkRole:Dosen'])->group(function () {
        //ROUTE INVENTORYS
        Route::get('/dosen/inventorys', [InventoryController::class, 'index'])->name('inventorys.index');
        Route::get('/dosen/inventorys/add', [InventoryController::class, 'create'])->name('inventorys.create');
        Route::post('/dosen/inventorys/store', [InventoryController::class, 'store'])->name('inventorys.store');
        Route::put('/dosen/inventorys/{id}', [InventoryController::class, 'update'])->name('inventorys.update');
        Route::get('/dosen/inventorys/{id}', [InventoryController::class, 'show'])->name('inventorys.show');
        Route::get('/dosen/inventorys/{id}', [InventoryController::class, 'edit'])->name('inventorys.edit');
        Route::delete('/dosen/inventorys/{id}', [InventoryController::class, 'destroy'])->name('inventorys.destroy');
        // ROUTE USAGE 
 // ROUTE USAGE 

    });

    Route::middleware(['auth', 'checkRole:Mahasiswa'])->group(function () {

    });
});
