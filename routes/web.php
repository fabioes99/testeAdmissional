<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ChamadoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () { return view('home'); })->name('home');
    Route::get('/chamados', [ChamadoController::class, 'create'] )->name('chamados');
    Route::post('/chamados/novo', [ChamadoController::class, 'store']);
    Route::get('/dashboard', [ChamadoController::class, 'show'] )->name('dashboard');
    Route::get('/response/{id}', [ChamadoController::class, 'response'] )->name('response');
    Route::post('/response/insert/{id}', [ChamadoController::class, 'insertResponse'] )->name('insertResponse');
});
