<?php

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


use App\Http\Controllers\ClientController;


Route::middleware(['cors'])->group(function () {
    Route::post('/register-client', [ClientController::class, 'register']);
    Route::post('/request-download/{client}', [ClientController::class, 'requestDownload']);
    Route::post('/upload-file/{client}', [ClientController::class, 'uploadFile']);
    Route::get('/status/{client}', [ClientController::class, 'status']);
});

