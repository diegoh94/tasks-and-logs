<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

// Tasks
Route::get('/tareas/registrar', [App\Http\Controllers\TaskController::class, 'create']);
Route::post('/tareas/registrar', [App\Http\Controllers\TaskController::class, 'store']);
Route::get('/tareas/{task}/ver', [App\Http\Controllers\TaskController::class, 'show']);
Route::get('/tareas/{task}/editar', [App\Http\Controllers\TaskController::class, 'edit']);
Route::put('/tareas/{task}/editar', [App\Http\Controllers\TaskController::class, 'update']);
Route::delete('/tareas/{task}/eliminar', [App\Http\Controllers\TaskController::class, 'destroy']);

// Logs
Route::post('/tareas/{task}/logs', [App\Http\Controllers\TaskLogController::class, 'store']);