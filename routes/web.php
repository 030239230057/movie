<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/admin/movies', [MovieController::class, 'trangQuanLy'])->name('admin.movies');

// 3. Chức năng Xóa phim
Route::get('/admin/movies/delete/{id}', [MovieController::class, 'xoaMemPhim'])->name('admin.movies.delete');