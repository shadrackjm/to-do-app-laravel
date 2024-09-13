<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/', [TaskController::class, 'home']);
Route::get('/load-form', [TaskController::class, 'index']);
//mvc
// Route::post('/post-data', [TaskController::class,'store']);
Route::post('/post-data', [TaskController::class,'store'])->name('create-task');