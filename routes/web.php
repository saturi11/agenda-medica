<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PacientesController;
/*
|--------------------------------------------------------------------------
| consulta
|--------------------------------------------------------------------------
*/
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
Route::get('/', [Controller::class, 'homepage']);
Route::get('/cadastrar', [Controller::class, 'cadastrar']);
/*Route::get('/', function () {
    return view('welcome');
    Route::get('/', [Controller::class, 'homepage']);
    Route::get('/cadastrar', [Controller::class, 'cadastrar']);
    Route::get('/login', [Controller::class, 'login']);
});
*/
/*
|--------------------------------------------------------------------------
| login
|--------------------------------------------------------------------------
*/
Route::get('/login', [Controller::class, 'login']);
Route::post('/login', [DashboardController::class, 'auth'])->name('user.login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
/*
|--------------------------------------------------------------------------
| user
|--------------------------------------------------------------------------
*/
Route::get('user', [UsersController::class, 'index'])->name('user.index');
Route::post('user', [UsersController::class, 'store'])->name('user.store');
Route::delete('user/{id}', [UsersController::class, 'destroy'])->name('user.delete');
Route::get('user/{id}', [UsersController::class, 'edit'])->name('user.edit');
Route::put('user/{id}', [UsersController::class, 'update'])->name('user.update');


/*
|--------------------------------------------------------------------------
| consulta
|--------------------------------------------------------------------------
*/

Route::get('consulta', [ConsultasController::class, 'index'])->name('consulta.index');
Route::post('consulta', [ConsultasController::class, 'store'])->name('consulta.store');
Route::delete('consulta/{id}', [ConsultasController::class, 'destroy'])->name('consulta.delete');
Route::put('consulta/{id}', [ConsultasController::class, 'edit'])->name('consulta.edit');


/*
|--------------------------------------------------------------------------
| paciente
|--------------------------------------------------------------------------
*/
Route::get('paciente', [PacientesController::class, 'index'])->name('paciente.index');
Route::post('paciente', [PacientesController::class, 'store'])->name('paciente.store');
Route::delete('paciente/{id}', [PacientesController::class, 'destroy'])->name('paciente.delete');
Route::put('paciente/{id}', [PacientesController::class, 'edit'])->name('paciente.edit');

