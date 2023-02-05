<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\WorkoutPeriodController;
use App\Http\Controllers\DashboardController;


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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

/* Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/workouts', function () {
        return view('workouts.index');
    })->name('workouts');
}); */

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('workouts', [WorkoutController::class, 'index'])->name('workouts');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('add_workout', [WorkoutController::class, 'create'])->name('add_workout');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('store_workout', [WorkoutController::class, 'store'])->name('store_workout');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('delete_workout', [WorkoutController::class, 'delete'])->name('delete_workout');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('edit_workout', [WorkoutController::class, 'edit'])->name('edit_workout');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('update_workout', [WorkoutController::class, 'update'])->name('update_workout');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('equipments', [EquipmentController::class, 'index'])->name('equipments');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('add_equipment', [EquipmentController::class, 'create'])->name('add_equipment');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('store_equipment', [EquipmentController::class, 'store'])->name('store_equipment');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('delete_equipment', [EquipmentController::class, 'delete'])->name('delete_equipment');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('edit_equipment', [EquipmentController::class, 'edit'])->name('edit_equipment');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('update_equipment', [EquipmentController::class, 'update'])->name('update_equipment');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('file_add', [EquipmentController::class, 'file_add'])->name('file_add');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::post('process', [EquipmentController::class, 'process'])->name('process');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('workout_periods', [WorkoutPeriodController::class, 'index'])->name('workout_periods');
});



