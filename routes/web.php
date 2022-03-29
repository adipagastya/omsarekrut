<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShowJobsByRegion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkFieldController;
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

use App\Models\Region;
use App\Models\User;
use App\Models\WorkField;

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
    return view('form', [
        'title' => 'Rekruitment',
        'regions' => Region::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Beranda',
        'regionCount' => Region::all(),
        'userCount' => User::all(),
        'workCount' => WorkField::all(),

    ]);
})->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/regions', RegionController::class)->middleware('auth');
Route::resource('/dashboard/workfields', WorkFieldController::class)->middleware('auth');
Route::resource('/dashboard/candidates', CandidateController::class);

Route::get('/recruit/{idregion}',[ShowJobsByRegion::class,'showJobsByRegion'] ); 
