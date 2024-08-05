<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\SessionController;
use App\Models\Job;

use Illuminate\Support\Facades\Route;

Route::get('test', function (){
    \App\Jobs\TranslateJob::dispatch();
    return 'Task queued';
});

Route::view('/','home');
Route::view('/contact','contact');

Route::resource('jobs', JobController::class);

Route::get('/jobs', [JobController::class,'index']);
Route::post('/jobs', [JobController::class,'store']);
Route::get('/jobs/create', [JobController::class,'create'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class,'show']);
Route::put('/jobs/{job}', [JobController::class,'update']);
Route::delete('/jobs/{job}', [JobController::class,'destroy']);
Route::get('/jobs/{job}/edit', [JobController::class,'edit'])
    ->middleware('auth')
    ->can('edit','job');


Route::get('/register',[RegisterUserController::class,'create'])->name('register');
Route::post('/register',[RegisterUserController::class,'store'])->name('register.store');

Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store'])->name('login.store');
Route::post('/logout',[SessionController::class,'destroy'])->name('logout');
