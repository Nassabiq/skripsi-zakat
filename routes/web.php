<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaMasjidController;
use App\Http\Controllers\GaleriController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/news', [BeritaMasjidController::class, 'index']);
Route::get('/agenda', [AgendaController::class, 'index']);
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/profile', function () {
    return view('profile');
});

// Admin Page
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {

        // GET DATA AGENDA
        Route::get('/agenda', [AgendaController::class, 'admin']);
        // INSERT DATA AGENDA
        Route::post('/agenda', [AgendaController::class, 'insert']);

        Route::patch(
            '/agenda/{id_agenda}',
            [AgendaController::class, 'update']
        )->name('updateAgenda'); // UPDATE DATA AGENDA

        Route::patch(
            '/agenda/validasi/{id_agenda}',
            [AgendaController::class, 'validasi']
        )->name('validasiAgenda'); // UPDATE STATUS DATA AGENDA

        Route::delete(
            '/agenda/{id_agenda}',
            [AgendaController::class, 'delete']
        )->name('deleteAgenda'); // DELETE DATA AGENDA

        Route::post(
            '/agenda/storeImage',
            [AgendaController::class, 'storeImage']
        )->name('storeAgenda');

        Route::get('/gallery', [GaleriController::class, 'index']);
        Route::get('/news', [BeritaMasjidController::class, 'admin']);
    });
});


// Auth Routes
Route::middleware('guest')->group(function () {
    // Redirected If Authenticated
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::get('/register', [AuthController::class, 'register_view']);
    Route::post('/authenticate', [AuthController::class, 'authenticate']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout']);
