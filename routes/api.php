<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\MatchRepotingController;
use App\Http\Controllers\API\TeamController;
use App\Http\Controllers\API\TeamPersonController;
use App\Http\Controllers\API\MatchScheduleController;
use App\Http\Controllers\API\NewsController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class,'login'])->middleware(['guest:api','throttle:5,10']);
    Route::post('logout', [AuthController::class,'logout'])->middleware(['auth:api']);

});

Route::middleware(['auth:api'])->group(function () {
    Route::prefix('news')->middleware('role:admin')->group(function () {
        Route::get('get', [NewsController::class,'index']);
        Route::post('create', [NewsController::class,'create']);
        Route::post('update', [NewsController::class,'update']);
        Route::delete('delete', [NewsController::class,'destroy']);
    });
});



