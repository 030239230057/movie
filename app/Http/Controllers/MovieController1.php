<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MovieController1 extends Controller
{
    private function getCommonData() {
        return [
            'genre' => DB::table('genre')->get(), 
            'title' => 'Xem Phim Online'
        ];
    }

    // 2.1 Trang chủ
    public function index() {
        try {
            $data = $this->getCommonData();
            
            $data['movies'] = DB::table('movie')
                ->where('popularity', '>', 450)        // Phổ biến > 450
                ->where('vote_average', '>', 7)        // Điểm bình chọn > 7
                ->orderBy('release_date', 'desc')      // Sắp xếp giảm dần theo ngày phát hành
                ->limit(12)                            // Lấy đúng 12 bộ phim
                ->get();
            
            return view('index', $data); 
        } catch (\Exception $e) {
            return response("Lỗi Trang chủ: " . $e->getMessage());
        }
    }

    // 2.2 Lọc theo thể loại
    public function getByGenre($id) {
        try {
            $data = $this->getCommonData();
            $data['movies'] = DB::table('movie') 
                ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie')
                ->where('movie_genre.id_genre', $id)
                ->select('movie.*')
                ->orderBy('release_date', 'desc') // Nên sắp xếp ở đây luôn cho đồng bộ
                ->limit(12)
                ->get();

            return view('index', $data);
        } catch (\Exception $e) {
            return response("Lỗi Thể loại: " . $e->getMessage());
        }
    }

    // 2.3 Tìm kiếm
    public function search(Request $request) {
        try {
            $data = $this->getCommonData();
            $keyword = $request->input('keyword');
            
            $data['movies'] = DB::select("select * from movie where movie_name_vn like ?", ["%".$keyword."%"]);

            $data['title'] = "Kết quả tìm kiếm: " . $keyword;
            
            return view('index', $data);
        } catch (\Exception $e) {
            return response("Lỗi Tìm kiếm: " . $e->getMessage());
        }
    }

    // 2.4 Chi tiết phim
    public function detail($id) {
        try {
            $data = $this->getCommonData();
            $data['movie'] = DB::table('movie')->where('id', $id)->first();
            
            if (!$data['movie']) return abort(404);

            return view('detail', $data);
        } catch (\Exception $e) {
            return response("Lỗi Chi tiết: " . $e->getMessage());
        }
    }
}