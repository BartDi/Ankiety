<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Middleware\CheckUserAccess;

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
    return view('main');
});

Route::controller(VoteController::class)->group(function() {
    Route::get('/create', 'createPoll')->name('create');
    Route::get('/enter', 'enterCode')->name('enter');
    Route::post('/verify', 'verify');
    Route::post('/set/poll', 'setPoll');
    Route::get('vote/{code}', 'vote')->name('vote');
    Route::post('add/vote', 'putVote')->middleware('access');
    Route::get('results/{code}/{voted?}', 'results')->name('result');
});