<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;



Route::get('/', [TaskController::class, 'home']);
Route::get('/load-form', [TaskController::class, 'index']);
//mvc
// Route::post('/post-data', [TaskController::class,'store']);
Route::post('/post-data', [TaskController::class, 'store'])->name('create-task');

//edit form
Route::get('/edit/{task_id}', [TaskController::class, 'show']);

Route::post('/update/task', [TaskController::class, 'edit'])->name('edit');

Route::get('/delete/{id}', [TaskController::class, 'delete']);