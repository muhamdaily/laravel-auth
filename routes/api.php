<?php

use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\SubDistrictController;
use App\Http\Controllers\Api\VillageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'wilayah'], function () {
    Route::group(['prefix' => 'provinsi'], function () {
        Route::get('/', [ProvinceController::class, 'index']);
        Route::post('update', [ProvinceController::class, 'update']);
    });

    Route::group(['prefix' => 'kabupaten'], function () {
        Route::get('/', [DistrictController::class, 'index']);
        Route::post('update', [DistrictController::class, 'update']);
    });

    Route::group(['prefix' => 'kecamatan'], function () {
        Route::get('/', [SubDistrictController::class, 'index']);
        Route::post('update', [SubdistrictController::class, 'update']);
    });
});
