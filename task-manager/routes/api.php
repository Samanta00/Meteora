<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;


Route::group(['middleware' => 'api'], function ($router){
    // Route::post('login', [AuthController::class, 'login']);
    // Route::post('users', [UserController::class, 'index']);

    Route::get('task/view/{id}', [TaskController::class, 'get']);
    Route::get('task', [TaskController::class, 'getList']);
    Route::post('task', [TaskController::class, 'store']);
    Route::put('task/update/{id}', [TaskController::class, 'update']);
    Route::delete('task/delete/{id}', [TaskController::class, 'destroy']);
    Route::post('task/search/{lembrete}', [TaskController::class, 'filterbyLembrete']);
    Route::post('tasks/pendency/{pendency}', [TaskController::class, 'filterBySituacao']);
    

});