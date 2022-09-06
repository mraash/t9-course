<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\StudentsController;

Route::redirect('/', '/students');


Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');

Route::get('/students', function () {
    return view('pages.students.archive-students');
})->name('students.index');

Route::get('/students/add', [StudentsController::class, 'create'])->name('students.add');
Route::post('/students/add', [StudentsController::class, 'store'])->name('students.store');

Route::get('/students/delete', [StudentsController::class, 'delete'])->name('students.delete');
Route::delete('/students/delete', [StudentsController::class, 'destroy'])->name('students.destroy');

Route::get('/students/{id}', function () {
    return view('pages.students.single-student');
})->name('students.single');
