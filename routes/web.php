<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

use App\Models\Region;
use App\Models\User;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Beranda',
        'regionCount' => Region::all(),
        'userCount' => User::all(),

    ]);
})->middleware('auth');

Route::resource('/dashboard/regions', RegionController::class)->middleware('auth');
