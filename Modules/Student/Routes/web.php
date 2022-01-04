<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\Http\Controllers\StudentController as BaseStudentController;

Route::group([], function() {
    Route::resource('students', StudentController::class);

    Route::get('archive/students', [BaseStudentController::class, 'archive'])->name('students.archive');
    Route::get('restore/student/{id}', [BaseStudentController::class, 'restore'])->name('students.restore');
    Route::get('delete/student/{id}', [BaseStudentController::class, 'delete'])->name('students.delete');
});
