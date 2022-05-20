<?php

use App\Http\Controllers\Api\FederalEntityController;
use App\Http\Controllers\Api\FederalEntityZipCodesController;
use App\Http\Controllers\Api\MunicipalityController;
use App\Http\Controllers\Api\MunicipalityZipCodesController;
use App\Http\Controllers\Api\SettlementTypeController;
use App\Http\Controllers\Api\SettlementTypeZipCodesController;
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
Route::get('/zip-codes/{zip_code}', [ZipCodeController::class, 'show']);

Route::get('/federal-entities', [FederalEntityController::class, 'index']);
Route::get('/federal-entities/{federal_entity}/zip-codes', [FederalEntityZipCodesController::class, 'index']);

Route::get('/municipalities', [MunicipalityController::class, 'index']);
Route::get('/municipalities/{municipality}/zip-codes', [MunicipalityZipCodesController::class, 'index']);

Route::get('/settlement-types', [SettlementTypeController::class, 'index']);
Route::get('/settlement-types/{settlement_type}/zip-codes', [SettlementTypeZipCodesController::class, 'index']);
