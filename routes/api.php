<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerbrandController;
use App\Http\Controllers\TypeequipmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/brands', [ComputerbrandController::class, 'index']);
Route::post('/brand/create', [ComputerbrandController::class, 'create']);
Route::get('/brand/show/{id}', [ComputerbrandController::class, 'show']);
Route::put('/brand/update/{id}', [ComputerbrandController::class, 'update']);
Route::delete('/brand/delete/{id}', [ComputerbrandController::class, 'destroy']);



Route::get('/typeequipments', [TypeequipmentController::class, 'index']);
Route::post('/typeequipment/create', [TypeequipmentController::class, 'create']);
Route::get('/typeequipment/show/{id}', [TypeequipmentController::class, 'show']);
Route::put('/typeequipment/update/{id}', [TypeequipmentController::class, 'update']);
Route::delete('/typeequipment/delete/{id}', [TypeequipmentController::class, 'destroy']);
