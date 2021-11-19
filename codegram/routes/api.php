<?php
use App\Events\productEvent;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReputationController;
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

Route::post('/register',[AuthController::class , 'register']);

Route::middleware('auth:sanctum')->resource('reputations', ReputationController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    event(new productEvent($user));
    return $user;
});
