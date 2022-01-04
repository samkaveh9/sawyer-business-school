<?php

use Illuminate\Support\Facades\Route;
use Modules\Teacher\Http\Controllers\TeacherController as BaseTeacherController;

Route::group([], function() {
    Route::resource('teachers', TeacherController::class);

    Route::get('archive/teachers', [BaseTeacherController::class, 'archive'])->name('teachers.archive');
    Route::get('restore/teachers/{id}', [BaseTeacherController::class, 'restore'])->name('teachers.restore');
    Route::get('delete/teachers/{id}', [BaseTeacherController::class, 'delete'])->name('teachers.delete');
});