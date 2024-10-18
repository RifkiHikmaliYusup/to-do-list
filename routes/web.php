<?php

// use App\Http\Controllers\halo\HalloCntroller;
use App\Http\Controllers\Todo\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/to-do', function (){
//     return view('to-do.app');
// });

// Route::get('/halo',[HalloCntroller::class,'index']);

Route::get('/to-do', [TodoController::class,'index'])->name("to-do");
Route::post('/to-do', [TodoController::class,'store'])->name("to-do.post");
Route::put('/to-do/{id}', [TodoController::class,'update'])->name("to-do.update");