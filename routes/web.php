<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShowJobsByRegion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkFieldController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DonwloadImageController;
use App\Http\Controllers\DownloadImageController;
use App\Http\Controllers\FormCandidateController;
use Illuminate\Support\Facades\Route;

use App\Models\Region;
use App\Models\User;
use App\Models\WorkField;
use App\Models\Candidate;




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

Route::resource('/', FormCandidateController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Beranda',
        'regionCount' => Region::all(),
        'userCount' => User::all(),
        'workCount' => WorkField::all(),
        'candidateCount' => Candidate::all(),
    ]);
})->middleware('auth');

Route::resource('/dashboard/users', UserController::class)->middleware('auth');
Route::resource('/dashboard/regions', RegionController::class)->middleware('auth');
Route::resource('/dashboard/workfields', WorkFieldController::class)->middleware('auth');
Route::resource('/dashboard/candidates', CandidateController::class)->middleware('admin');



Route::get('/recruit/{idregion}',[ShowJobsByRegion::class,'showJobsByRegion'] ); 
Route::get('public/{certificate_address}', [CandidateController::class, 'getImage'])->name('getimage'); 
