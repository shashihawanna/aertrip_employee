<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login',  [UserAuthController::class, 'login']);
Route::apiResource('/employee', EmployeeController::class)->middleware('auth:api');
Route::apiResource('/department', DepartmentController::class)->middleware('auth:api');
Route::get('/search-employee', [EmployeeController::class, 'searchEmployee'])->middleware('auth:api');

Route::any('{segment}', function () {
    return response()->json([
        'error' => 'Invalid url.'
    ]);
})->where('segment', '.*');

Route::get('unauthorized', function () {
    return response()->json([
        'error' => 'Unauthorized.'
    ], 401);
})->name('unauthorized');
