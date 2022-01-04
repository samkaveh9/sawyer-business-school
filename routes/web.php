<?php

use Illuminate\Support\Facades\Route;
use samkaveh\User\Models\User;

Route::get('/', function () {
    return view('welcome');
});
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test', function(){

// dd(storage_path());

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
