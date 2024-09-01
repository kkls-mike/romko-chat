<?php

use App\Http\Controllers\GoodBoiModelController;
use Illuminate\Support\Facades\Route;


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

Route::prefix('good-boi')->group(function () {
    Route::post('/store-model', [GoodBoiModelController::class, 'storeModel'])->withoutMiddleware('');
    Route::get('/get-model', [GoodBoiModelController::class, 'getModel']);
    Route::get('/get-weights-file', [GoodBoiModelController::class, 'getWeightsFile']);
});