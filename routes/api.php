<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::get('getAllDistricts', [AjaxController::class, 'getAllDistricts'])->name('getAllDistricts');
Route::get('getBlocks/{districtId}', [AjaxController::class, 'getBlocks'])->name('getBlocks');
Route::get('getVcdcs/{blockId}', [AjaxController::class, 'getVcdcs'])->name('getVcdcs');
Route::get('getAllStates', [AjaxController::class, 'getAllStates'])->name('getAllStates');
Route::get('getStatesForRegistration', [AjaxController::class, 'getStatesForRegistration'])->name('getStatesForRegistration');
Route::get('getCitiesByStateId/{id}', [AjaxController::class, 'getCitiesByStateId'])->name('getCitiesByStateId');