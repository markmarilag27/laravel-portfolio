<?php

use App\Http\Controllers\API\Auth\CurrentUserController;
use App\Http\Controllers\API\Auth\LoginController;
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

Route::get('health', fn () => response()->json(['status' => 'ok']));

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/
Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('login', LoginController::class)->name('login');
    Route::post('logout', [CurrentUserController::class, 'logout'])->name('logout');
    Route::get('me', [CurrentUserController::class, 'getInformation'])->name('me');
});
