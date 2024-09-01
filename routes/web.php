<?php

use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SportController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\LoginController;
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
    return view('home-page/home');
});

Route::get('/billetterie', function () {
    return view('home-page/billetterie');
});

// SPORT ROUTES
Route::get('/admin/manage-sports', [SportController::class, 'index'])->name('manageSports');
Route::post('/admin/manage-sports', [SportController::class, 'store'])->name('storeSport');
Route::delete('/admin/delete-sport/{id}', [SportController::class, 'delete'])->name('deleteSport');

// PLACE ROUTES
Route::get('/admin/manage-places', [PlaceController::class, 'index'])->name('managePlaces');
Route::post('/admin/manage-places', [PlaceController::class, 'store'])->name('storePlace');
Route::delete('/admin/delete-place/{id}', [PlaceController::class, 'delete'])->name('deletePlace');

// COMPETITION ROUTES
Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');
Route::get('/admin/manage-competitions', [CompetitionController::class, 'index'])->name('manageCompetitions');
Route::post('/admin/store-competitions', [CompetitionController::class, 'store'])->name('storeCompetition');
Route::delete('/admin/delete-competition/{id}', [CompetitionController::class, 'delete'])->name('deleteCompetition');

// RESERVATION ROUTES
Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('/reservation/confirmation', [ReservationController::class, 'confirmation'])->name('reservation.confirmation');

// CALENDRIER ROUTES
Route::get('/calendrier', [CalendarController::class, 'index'])->name('calendar');
Route::get('/calendrier/filtrer', [CalendarController::class, 'filter'])->name('competition.filter');
Route::get('/reservation/show', [CalendarController::class, 'showReservationView'])->name('reservation.show');

// LOGIN ROUTES
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login']);

// ADMIN PANEL ROUTES
Route::get('/admin/panel', [AdminPanelController::class, 'index'])->name('admin.panel');