<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[NewsController::class,'welcome']);
Route::get('/news/{id}',[NewsController::class,'show']);

Route::middleware('auth')->group(function () {
    Route::get('/edit',[NewsController::class,'edit'])->name('/edit'); //Edit da News
    Route::post('/news',[NewsController::class,'store']);
    Route::delete('/news/{id}',[NewsController::class,'destroy']);  
    Route::get('/news/alter/{id}',[NewsController::class,'alter']); 
    Route::put('/news/update/{id}',[NewsController::class,'update']); 

    Route::get('/users/edit',[UserController::class,'users'])->name('/users/edit'); //Edit do Usuário
    Route::delete('/users/{id}',[UserController::class,'destroy']);  
    Route::get('/users/alter/{id}',[UserController::class,'alter']);  
    Route::get('/users/alter/{id}',[UserController::class,'alter']);  
    Route::put('/users/update/{id}',[UserController::class,'update']); 
    Route::post('/users/edit',[UserController::class,'store']);
 
});

Route::get('dashboard',[NewsController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
