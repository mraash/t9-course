<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');


Route::get('/groups', function () {
    return view('pages.groups.find-group');
})->name('groups.index');

Route::get('/students', function () {
    return view('pages.students.archive-students');
})->name('students.index');

Route::get('/students/add', function () {
    return view('pages.students.add-student');
})->name('students.add');

Route::get('/students/delete', function () {
    return view('pages.students.delete-student');
})->name('students.delete');

Route::get('/students/{id}', function () {
    return view('pages.students.single-student');
})->name('students.single');
