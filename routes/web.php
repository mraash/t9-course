<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\StudentsController;

Route::redirect('/', '/students');

Route::prefix('/groups')->controller(GroupsController::class)->group(function () {
    Route::get('/', 'index')->name('groups.index');
});

Route::prefix('/students')->controller(StudentsController::class)->group(function () {
    Route::get('/', 'index')->name('students.index');
    Route::get('/{id}', 'single')->name('students.single');

    Route::get('/add', 'add')->name('students.add');
    Route::post('/add', 'create')->name('students.create');

    Route::get('/delete', 'remove')->name('students.remove');
    Route::delete('/delete', 'delete')->name('students.delete');

    Route::delete('/{id}/courses/{courseId}/delete', 'removeCourse')
        ->name('students.courses.delete')
        ->whereNumber('courseId')
    ;
});
