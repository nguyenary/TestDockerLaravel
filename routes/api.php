<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/users', 'Users@create');

Route::get('/users/{id}', 'Users@get')->where('id', '[\d]+');

Route::put('/users/{id}', 'Users@update')->where('id', '[\d]+');

Route::delete('/users/{id}', 'Users@delete')->where('id', '[\d]+');
