<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', \App\Http\Controllers\HomeController::class.'@index')->name('home');
Route::get('/team', \App\Http\Controllers\TeamController::class.'@index')->name('team.index'); 
Route::get('/chat', \App\Http\Controllers\ChatController::class.'@index')->name('chat.index'); 
Route::get('/chat/all-rooms', \App\Http\Controllers\ChatController::class.'@rooms')->name('chat.rooms'); 

