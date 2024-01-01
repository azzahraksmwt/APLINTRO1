<?php

use App\Http\Controllers\API\InventoryController;
use App\Http\Controllers\API\UsageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('editprofile', [UserController::class,'updateProfile']);
    Route::post('inventory/store', [InventoryController::class,'store']);
    Route::get('inventory', [InventoryController::class,'fetch']);
    Route::post('inventory/update/{idbarang}', [InventoryController::class,'update']);
    Route::delete('inventory/delete/{idbarang}', [InventoryController::class,'destroy']);
    Route::post('usage/store', [UsageController::class,'store']);
});

