<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController; 
use App\Http\Controllers\MovieController3; 



Route::get('/', [MovieController::class, 'index']);

Route::get('/admin/movies', [MovieController::class, 'trangQuanLy'])->name('admin.movies');
Route::get('/admin/movies/delete/{id}', [MovieController::class, 'xoaMemPhim'])->name('admin.movies.delete');

Route::get('/movie/create', [MovieController3::class, 'create'])->name('movie.create');
Route::post('/movie/store', [MovieController3::class, 'store'])->name('movie.store');

Route::get('/theloai/{id}', [App\Http\Controllers\MovieController1::class, 'getByGenre']);
Route::post('/timkiem', [App\Http\Controllers\MovieController1::class, 'search']);
Route::get('/chitiet/{id}', [App\Http\Controllers\MovieController1::class, 'detail']);

