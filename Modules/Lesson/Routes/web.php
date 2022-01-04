<?php

use Illuminate\Support\Facades\Route;

Route::group([], function() {
    Route::resource('lessons', LessonController::class);
    Route::resource('fields', FieldController::class);
});
