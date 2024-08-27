<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeRequestController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\MaintenanceController;

// Rute untuk login
Route::get('/', function () {
    return view('login');
})->name('login');

route::post('/login',[LoginController::class,'login'])->name('login.check');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

// rute dashboard
Route::get('/home', function () {
    return view('home');
})->name('home');

// Rute untuk halaman Change Request Form
Route::get('/change-request', function () {
    return view('change-request');
});

// Rute untuk halaman Task Description
Route::get('/task-description', function () {
    return view('task-description');
});

// Rute untuk halaman Task List
Route::get('/task-list', [TaskListController::class, 'index']);

// Rute untuk halaman Upload
Route::get('/upload', [UploadController::class, 'showUploadForm']);

// Rute untuk menangani pengiriman Change Request Form
Route::post('/submit-change-request', [ChangeRequestController::class, 'store']);

// Rute untuk menangani pengiriman Task List Form
Route::post('/submit-task-list', [TaskListController::class, 'store']);

// Rute untuk menangani upload dokumen
Route::post('/upload', [UploadController::class, 'upload']);

// Rute untuk menampilkan dokumen
Route::get('/library', [LibraryController::class, 'index'])->name('maintenance.library');

// Rute untuk menampilkan informasi dokumen (popup)
Route::get('/library/document/{id}', [LibraryController::class, 'show'])->name('library.document.show');


Route::get('maintenance/change-request/create', [MaintenanceController::class, 'createChangeRequest'])->name('maintenance.createChangeRequest');
Route::post('maintenance/change-request', [MaintenanceController::class, 'storeChangeRequest'])->name('maintenance.storeChangeRequest');

Route::get('maintenance/task-description/create', [MaintenanceController::class, 'createTaskDescription'])->name('maintenance.createTaskDescription');
Route::post('maintenance/task-description', [MaintenanceController::class, 'storeTaskDescription'])->name('maintenance.storeTaskDescription');

Route::get('maintenance/task-list/create', [MaintenanceController::class, 'createTaskList'])->name('maintenance.createTaskList');
Route::post('maintenance/task-list', [MaintenanceController::class, 'storeTaskList'])->name('maintenance.storeTaskList');

Route::get('/maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
Route::get('/maintenance/{id}', [MaintenanceController::class, 'show'])->name('maintenance.show');
Route::get('/maintenance/{id}/reportPDF', [MaintenanceController::class, 'reportPDF'])->name('maintenance.reportPDF');
