<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phim</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        body { margin: 0; padding: 0; }

        /* BANNER CHỈNH SỬA - FULL TRANG */
  .banner {
    /* Giữ nguyên phần background của bạn */
    background-image: linear-gradient(rgba(3, 37, 65, 0.8), rgba(3, 37, 65, 0.8)), url('{{ asset("storage/images/banner.jpg") }}'); 
    background-size: cover;
    background-position: center;
    
    /* CĂN GIỮA NỘI DUNG */
    display: flex;
    flex-direction: column; /* Sắp xếp chữ theo hàng dọc */
    justify-content: center; /* Căn giữa theo chiều dọc */
    align-items: center;     /* Căn giữa theo chiều ngang */
    text-align: center;      /* Căn giữa nội dung văn bản bên trong */
    
    width: 100%;
    min-height: 350px; 
    color: white;
    padding: 20px;
}

.banner h2 {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 10px; /* Tạo khoảng cách với dòng dưới */
}

.banner h5 {
    font-size: 1.5rem;
    font-weight: 400;
    margin: 0;
}

        /* Sidebar & Table Layout */
        .sidebar-genres {
            background-color: #222; 
            color: white;
            min-height: 100vh;
            padding: 0;
        }
        .sidebar-header {
            background-color: #333;
            padding: 15px;
            font-weight: bold;
            border-bottom: 1px solid #444;
        }
        .sidebar-genres ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-genres ul li {
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid #333;
        }
        .sidebar-genres ul li:hover {
            background-color: #444;
        }

        .movie-poster {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

    <div class="banner">
        <h2 style = "text-align: center;">Welcome.</h2>
        <h5>Millions of movies, TV shows and people to discover. Explore now.</h5>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar-genres">
                <div class="sidebar-header">
                    📁 Thể loại phim
                </div>
                <ul>
                    <li>Phim Hành Động</li>
                    <li>Phim Phiêu Lưu</li>
                    <li>Phim Hoạt Hình</li>
                    <li>Phim Hài</li>
                    <li>Phim Hình Sự</li>
                    <li>Phim Tài Liệu</li>
                    <li>Phim Chính Kịch</li>
                    <li>Phim Gia Đình</li>
                    <li>Phim Giả Tượng</li>
                    <li>Phim Lịch Sử</li>
                </ul>
            </div>

            <div class="col-md-9 col-lg-10 p-4">
                <h3 class="text-center mb-4">DANH SÁCH PHIM</h3>
                
                <div class="mb-3">
                    <a href="{{ route('movie.create') }}" class="btn btn-success btn-sm">Thêm</a>
                </div>
                
                <table id="id-table" class="table table-striped table-bordered" style="width:100%">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Ảnh đại diện</th>
                            <th>Tiêu đề</th>
                            <th>Giới thiệu</th>
                            <th>Ngày phát hành</th>
                            <th>Điểm đánh giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danh_sach_phim as $phim)
                        <tr>
                            <td class="text-center">
                                <img src="{{ filter_var($phim->image, FILTER_VALIDATE_URL) ? $phim->image : asset('storage/' . $phim->image) }}" class="movie-poster" alt="Poster" onerror="this.src='https://via.placeholder.com/50x75?text=No+Image'">
                            </td>
                            <td style="max-width: 150px;">{{ $phim->movie_name_vn ?? $phim->title ?? 'Đang cập nhật' }}</td>
                            <td style="max-width: 250px;">{{ Str::limit($phim->overview_vn ?? 'Nội dung đang cập nhật...', 80) }}</td>
                            <td class="text-center">{{ $phim->release_date ?? 'N/A' }}</td>
                            <td class="text-center">{{ $phim->vote_average ?? 'N/A' }}</td>
                            <td class="text-center" style="min-width: 120px;">
                                <a href="{{ url('/chi-tiet/' . $phim->id) }}" class="btn btn-primary btn-sm">Xem</a>
                                <a href="{{ route('admin.movies.delete', $phim->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5, 
                lengthMenu: [5, 10, 25, 50, 100],
            });
        });
    </script>
</body>
</html>