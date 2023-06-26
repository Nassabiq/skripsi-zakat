<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaMasjidController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ZisController;
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

Route::get('/', fn () => view('home'))->name('home');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/profile', fn () => view('profile'))->name('profile');
Route::get('/kalkulator', fn () => view('kalkulator'))->name('kalkulator');

Route::get('/news', [BeritaMasjidController::class, 'index'])->name('news');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');


// Admin Page
Route::middleware('auth')->group(function () {

    /** ----------------- ZIS MODULE --------------------- **/

    Route::group(['middleware' => ['role:admin|muzakki']], function () {
        Route::get('/zis', [ZisController::class, 'index'])->name('zis');

        Route::post('/zis', [ZisController::class, 'insert'])->name('addZis');
        Route::patch('/zis/{id}', [ZisController::class, 'uploadPembayaran'])->name('uploadPembayaran');

        Route::get('/data-muzakki', [ZisController::class, 'dashboard'])->name('data_muzakki');

        Route::get('/zakat-fitrah', [ZisController::class, 'zakatFitrah']);
        Route::get('/zakat-mal', [ZisController::class, 'zakatMal']);
        Route::get('/infaq-sodaqoh', [ZisController::class, 'infaqSodaqoh']);

        Route::get('/invoice/{id}', [ZisController::class, 'invoice'])->name('invoice');
    });


    // ADMIN DASHBOARD
    Route::prefix('admin')->group(function () {

        /** ----------------- AGENDA MODULE --------------------- **/

        Route::group(['middleware' => ['role:admin|takmir|ketua']], function () {
            Route::get('/agenda', [AgendaController::class, 'admin'])->name('admin_agenda'); // GET DATA AGENDA
            Route::post('/agenda', [AgendaController::class, 'insert']); // INSERT DATA AGENDA
            Route::post('/agenda/storeImage', [AgendaController::class, 'storeImage'])->name('storeAgenda'); // IMAGE STORING CKEDITOR
            Route::patch('/agenda/{id_agenda}', [AgendaController::class, 'update'])->name('updateAgenda'); // UPDATE DATA AGENDA
            Route::patch('/agenda/validasi/{id_agenda}', [AgendaController::class, 'validasi'])->name('validasiAgenda'); // UPDATE STATUS DATA AGENDA
            Route::delete('/agenda/{id_agenda}', [AgendaController::class, 'delete'])->name('deleteAgenda'); // DELETE DATA AGENDA
        });


        /** ----------------- GALERI MODULE --------------------- **/
        Route::group(['middleware' => ['role:admin|takmir']], function () {
            Route::get('/gallery', [GaleriController::class, 'index'])->name('admin_galeri'); // GET DATA GALERI
            Route::post('/gallery', [GaleriController::class, 'insert'])->name('addGallery'); // INSERT DATA GALERI
            Route::patch('/gallery/{id}', [GaleriController::class, 'update'])->name('updateGallery'); // UPDATE DATA GALERI
            Route::delete('/gallery/{id}', [GaleriController::class, 'delete'])->name('deleteGallery'); // DELETE DATA GALERI
        });

        /** ------------ BERITA MASJID MODULE ---------------- **/

        Route::group(['middleware' => ['role:admin|takmir|ketua']], function () {
            Route::get('/news', [BeritaMasjidController::class, 'admin'])->name('admin_news'); // GET DATA BERITA MASJID
            Route::post('/news', [BeritaMasjidController::class, 'insert'])->name('addBerita'); // INSERT DATA BERITA
            Route::patch('/news/{id}', [BeritaMasjidController::class, 'update'])->name('updateBerita'); // UPDATE DATA BERITA
            Route::delete('/news/{id}', [BeritaMasjidController::class, 'delete'])->name('deleteBerita'); // DELETE DATA BERITA
        });

        /** ------------ LAPORAN ZIS MODULE ---------------- **/

        Route::group(['middleware' => ['role:admin|ketua|bendahara']], function () {
            Route::get('/zis', [ZisController::class, 'laporanZIS'])->name('laporan_zis');
            Route::patch('/zis/{id}', [ZisController::class, 'validasiPembayaran'])->name('validasiPembayaran');
        });

        /** ------------ KELOLA USER MODULE ---------------- **/

        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/users', [AuthController::class, 'kelolaUsers'])->name('kelola_user'); // GET DATA USER
            Route::post('/users', [AuthController::class, 'insert'])->name('addUser'); // INSERT DATA USER
            Route::patch('/users/{id}', [AuthController::class, 'update'])->name('updateUser'); // UPDATE DATA USER
            Route::delete('/users/{id}', [AuthController::class, 'delete'])->name('deleteUser'); // DELETE DATA USER
        });
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
