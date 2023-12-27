<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;


Route::group(['middleware' => 'api'], function ($router){
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('users', [UserController::class, 'index']);

    Route::get('tasks', [TaskController::class, 'getList']);
    Route::post('tasks', [TaskController::class, 'store']);

});