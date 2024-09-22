<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;



//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', [TaskController::class, 'welcomepage']);

//Route::get('/task/page', [AuthenticatedSessionController::class, 'home'])->name('task.list');


Route::get('/task/page', [TaskController::class, 'home'])
->middleware(['auth', 'verified'])->name('task.lists');

Route::get('/load/form', [TaskController::class, 'index']);

Route::post('/load/form', [TaskController::class, 'store'])->name('create-task');

Route::get('/delete/{id}', [TaskController::class, 'delete']);
Route::get('/edit/{id}', [TaskController::class, 'show']);

Route::post('/task/form', [TaskController::class, 'edit'])->name('edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/update-task-status', [AuthenticatedSessionController::class, 'updateStatus']);

require __DIR__.'/auth.php';
