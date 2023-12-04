<?php

use App\Http\Controllers\Classroom\AnnouncementController;
use App\Http\Controllers\Classroom\AssignmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Classroom\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register-process', [RegisterController::class, 'registerProcess'])->name('register.process');
Route::post('/login-process', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>['role:teacher']], function(){
    Route::get('/home/teacher', [ClassroomController::class, 'getTeacherClassroom'])->name('teacher.home');
    Route::get('/classroom/add', [ClassroomController::class, 'create'])->name('teacher.classroom_add');
    Route::get('/classroom/material/add', [MaterialController::class, 'create'])->name('teacher.add.material');
    Route::post('/classroom/add-process', [ClassroomController::class, 'store'])->name('classroom.add-process');
    Route::post('/classroom/material/add-process', [MaterialController::class, 'store'])->name('material.add-process');
    Route::get('/classroom/assignment-add', [AssignmentController::class, 'createAssignment'])->name('add.assignment');
    Route::post('/classroom/assignment-store', [AssignmentController::class, 'storeAssignment'])->name('store.assignment');
    Route::get('/classroom/announcement-add', [AnnouncementController::class, 'createAnnouncement'])->name('add.announcement');
    Route::post('/classroom/announcement-store', [AnnouncementController::class, 'storeAnnouncement'])->name('store.announcement');
    Route::get('/classroom/destroy/{id}', [ClassroomController::class, 'destroyClassroom'])->name('destroy.classroom');
    Route::get('/announcement/destroy/{id}', [AnnouncementController::class, 'destroyAnnouncement'])->name('destroy.announcement');
    Route::get('/assignment/destroy/{id}', [AssignmentController::class, 'destroyAssignment'])->name('destroy.assignment');
    Route::get('/material/destroy/{id}', [MaterialController::class, 'destroyMaterial'])->name('destroy.material');
});

Route::group(['middleware'=>['role:student']], function(){
    Route::get('/home/student', [ClassroomController::class, 'getStudentClassroom'])->name('student.home');
    Route::post('/classroom/join-process', [ClassroomController::class, 'joinClassroomProcess'])->name('classroom.join-process');
    Route::get('/class/join', function () { return view('student.classroom.classroom-join');})->name('student.classroom_join');
    Route::post('/classroom/assignment-submit', [AssignmentController::class, 'submitAssignment'])->name('student.submit.assignment');
});

Route::group(['middleware'=>['role:student,teacher']], function(){
    Route::get('/classroom/{code}', [ClassroomController::class, 'getDetailClassroom'])->name('detail.classroom');
    Route::get('/classroom/material/{classroom_id}', [MaterialController::class, 'getMaterial'])->name('classroom.material');
    Route::get('/classroom/assignment/{classroom_id}', [AssignmentController::class, 'getAssignment'])->name('classroom.assignment');
    Route::get('/classroom/assignment/detail/{id}', [AssignmentController::class, 'getAssignmentDetail'])->name('classroom.assignment.detail');
    Route::get('/classroom/announcement/{classroom_id}', [AnnouncementController::class, 'getAnnouncement'])->name('classroom.announcement');
});


