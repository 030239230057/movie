<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    // Hàm hiển thị danh sách
    public function trangQuanLy()
    {
        
        $danh_sach_phim = DB::select("select * from movie where status = 1");
        
        return view('quan_ly', ['danh_sach_phim' => $danh_sach_phim]);
    }

   
    public function xoaMemPhim($id)
    {
        
        DB::update("update movie set status = 0 where id = ?", [$id]);
        
       
        return redirect()->route('admin.movies');
    }
}