<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ManageAdminsController;
use App\Http\Controllers\ManageJobsController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ReactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::get('/', [IndexController::class, 'index'])->name('home');

Route::prefix('/jobs')->group(function() {
    Route::get('/', [JobController::class, 'index'])->name('jobs');
    Route::get('/{id}', [JobController::class, 'show']);

    Route::get('/react/{id}', [ReactController::class, 'show']);
    Route::post('/react', [ReactController::class, 'store'])->middleware(['auth']);
});

Route::prefix('/admin')->middleware(['auth', 'checkadmin'])->group(function() {
    Route::get('/jobs', [ManageJobsController::class, 'index']);
    Route::get('/jobs/edit/{id}', [ManageJobsController::class, 'edit']);
    Route::post('/jobs/create', [ManageJobsController::class, 'store']);
    Route::post('/jobs/update/{id}', [ManageJobsController::class, 'update']);
    Route::post('/jobs/delete/{id}', [ManageJobsController::class, 'destroy']);

    Route::get('/users', [ManageUsersController::class, 'index']);
    Route::post('/users/delete/{id}', [ManageUsersController::class, 'destroy']);

    Route::post('/users/administrator/add/{id}', [ManageAdminsController::class, 'update']);
    Route::post('/users/administrator/delete/{id}', [ManageAdminsController::class, 'destroy']);

    Route::get('/jobs/reactions', [ReactController::class, 'index']);
    Route::get('/jobs/reactions/{id}', [ReactController::class, 'edit']);
    Route::post('/jobs/reactions/delete/{id}', [ReactController::class, 'destroy']);
});
