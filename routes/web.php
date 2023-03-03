<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Inertia\Inertia;
///////////////////////////////////////
use App\Http\Controllers\TravelsController;
use App\Http\Controllers\UserController;


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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', function () {
    return Inertia::render('Initiated');
});

Auth::routes(['verify' => true]); //Activa la verificación en las rutas para laravel/ui
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

// USER //
Route::get('/profile', [UserController::class, 'show'])->name('User.show->Profile');
Route::get('/profile-edit', [UserController::class, 'editProfile'])->name('User.edit->Profile');

//////////////////////////////
Route::get('/travels', [TravelsController::class, 'index'])->name('travels.index');
//F O R M //
Route::get('/newride', [TravelsController::class, 'create'])->name('newride.form');
Route::post('/newride', [TravelsController::class, 'create'])->name('newride.form');
//////////////////////////////

Auth::routes();
