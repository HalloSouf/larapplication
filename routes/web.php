<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ManageAdminController;
use App\Http\Controllers\ManageJobController;
use App\Http\Controllers\ManageUserController;
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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'show']);
Route::get('/jobs/react/{id}', [ReactController::class, 'show']);
Route::post('/jobs/react/{id}', [ReactController::class, 'store'])->middleware(['auth']);

Route::prefix('/admin')->middleware(['auth', 'Administrator'])->group(function() {
    Route::get('/', [ReactController::class, 'index']);
    Route::get('/reactions/{id}', [ReactController::class, 'edit']);
    Route::post('/reactions/delete/{id}', [ReactController::class, 'destroy']);

    Route::get('/users', [ManageUserController::class, 'index']);
    Route::post('/users/delete/{id}', [ManageUserController::class, 'destroy']);

    Route::get('/jobs/create', [ManageJobController::class, 'create']);
    Route::post('/jobs/create', [ManageJobController::class, 'store']);
    Route::get('/jobs/overview', [ManageJobController::class, 'index']);
    Route::get('/jobs/edit/{id}', [ManageJobController::class, 'edit']);
    Route::post('/jobs/edit/{id}', [ManageJobController::class, 'update']);
    Route::post('/jobs/delete/{id}', [ManageJobController::class, 'destroy']);

    Route::post('/users/admin/add/{id}', [ManageAdminController::class, 'update']);
    Route::post('/users/admin/delete/{id}', [ManageAdminController::class, 'destroy']);
});
