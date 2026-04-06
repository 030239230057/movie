<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/admin/movies', [MovieController::class, 'trangQuanLy'])->name('admin.movies');

Route::get('/admin/movies/delete/{id}', [MovieController::class, 'xoaMemPhim'])->name('admin.movies.delete');