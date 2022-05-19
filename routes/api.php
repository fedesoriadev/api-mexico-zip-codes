<?php

use App\Http\Controllers\Api\FederalEntityController;
use App\Http\Controllers\Api\MunicipalityController;
use App\Http\Controllers\Api\SettlementTypeController;
use App\Http\Controllers\Api\ZipCodeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/zip-codes', [ZipCodeController::class, 'index']);
Route::get('/zip-codes/{zip_code:zip_code}', [ZipCodeController::class, 'show']);

Route::get('/federal-entities', [FederalEntityController::class, 'index']);
Route::get('/federal-entities/{federal_entity:name}', [FederalEntityController::class, 'show']);

Route::get('/municipalities', [MunicipalityController::class, 'index'])->name('m.');
Route::get('/municipalities/{municipality:name}', [MunicipalityController::class, 'show']);

Route::get('/settlement-types', [SettlementTypeController::class, 'index']);
Route::get('/settlement-types/{settlement_type:name}', [SettlementTypeController::class, 'show']);
