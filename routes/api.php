<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComputerbrandController;

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
Route::post('/brands/create', [ComputerbrandController::class, 'create']);
Route::get('/brands/show/{id}', [ComputerbrandController::class, 'show']);
Route::put('/brands/update/{id}', [ComputerbrandController::class, 'update']);
Route::delete('/brands/delete/{id}', [ComputerbrandController::class, 'destroy']);
