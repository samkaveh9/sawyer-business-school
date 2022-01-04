<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController as BaseUserController;

Route::group([], function() {
    Route::resource('users', UserController::class);

    Route::get('archive/users', [BaseUserController::class, 'archive'])->name('users.archive');
    Route::get('restore/user/{id}', [BaseUserController::class, 'restore'])->name('users.restore');
    Route::get('force-delete/user/{id}', [BaseUserController::class, 'delete'])->name('users.delete');
});
