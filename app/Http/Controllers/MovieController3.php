<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController3 extends Controller
{
    // Hàm hiển thị form
    public function create()
    {
        return view('movie.create');
    }

    // Hàm xử lý lưu dữ liệu
    public function store(Request $request)
    {
        // 1. Tùy chỉnh TẤT CẢ thông báo lỗi bằng tiếng Việt
        $messages = [
            'ten_tieng_anh.required' => 'Vui lòng nhập tên tiếng Anh.',
            'ten_tieng_viet.required' => 'Vui lòng nhập tên tiếng Việt.',
            'ngay_phat_hanh.required' => 'Vui lòng nhập ngày phát hành.',
            'ngay_phat_hanh.date_format' => 'Ô dữ liệu ngày phát hành nhập theo định dạng: yyyy-mm-dd',
            'mo_ta.required' => 'Vui lòng nhập mô tả.',
            'anh_dai_dien.required' => 'Vui lòng chọn ảnh đại diện.',
            'anh_dai_dien.image' => 'File tải lên không phải là định dạng ảnh hợp lệ.',
            'anh_dai_dien.mimes' => 'File tải lên phải có đuôi jpeg, png, jpg, gif.',
            'anh_dai_dien.uploaded' => 'File tải lên bị lỗi hoặc quá dung lượng cho phép. Vui lòng chọn ảnh khác.',
        ];

        // 2. Kiểm tra tính hợp lệ của dữ liệu
        $validatedData = $request->validate([
            'ten_tieng_anh' => 'required|string',
            'ten_tieng_viet' => 'required|string',
            'ngay_phat_hanh' => 'required|date_format:Y-m-d',
            'mo_ta' => 'required|string',
            // Ràng buộc thêm mimes để đảm bảo chắc chắn là file ảnh
            'anh_dai_dien' => 'required|image|mimes:jpeg,png,jpg,gif', 
        ], $messages);

        // 3. Xử lý upload ảnh
        $imagePath = null;
        if ($request->hasFile('anh_dai_dien')) {
            $image = $request->file('anh_dai_dien');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = '/' . $imageName; 
        }

        // 4. Lưu vào Database
        $maxId = DB::table('movie')->max('id');
        $newId = $maxId ? $maxId + 1 : 1;

        DB::table('movie')->insert([
            'id' => $newId,
            'original_name' => $request->ten_tieng_anh,
            'movie_name' => $request->ten_tieng_anh,
            'movie_name_vn' => $request->ten_tieng_viet,
            'release_date' => $request->ngay_phat_hanh,
            'overview_vn' => $request->mo_ta,
            'image' => $imagePath,
        ]);

        // 5. Chuyển hướng về lại form kèm thông báo thành công
        return redirect()->back()->with('success', 'Thêm phim mới thành công!');
    }
}