<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController3;

Route::get('/', [App\Http\Controllers\MovieController::class, 'index']);
Route::get('/movie/create', [MovieController3::class, 'create']);
