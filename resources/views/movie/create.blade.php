<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { 
            overflow-x: hidden; 
            font-family: Arial, sans-serif;
            background-color: #fff;
        }
        
        /* --- Phần Banner --- */
        .banner-section {
            /* Đường dẫn đã được sửa để trỏ vào storage/images/banner.jpg */
            background-image: url('{{ asset("storage/images/banner.jpg") }}'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            padding: 50px 0; 
            color: white;
        }

        .banner-section::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: rgba(0, 90, 130, 0.6); 
            z-index: 1;
        }

        .banner-content {
            position: relative;
            z-index: 2;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center; 
        }

        .banner-content h1 {
            font-size: 2.8rem;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .banner-content h4 {
            font-size: 1.4rem;
            font-weight: 400;
            margin-bottom: 25px;
        }

        /* --- Thanh tìm kiếm --- */
        .search-container {
            position: relative;
            width: 100%;
            margin: 0 auto;
        }
        .search-input {
            width: 100%;
            padding: 15px 25px;
            border-radius: 30px; 
            border: none;
            font-size: 16px;
            outline: none;
            color: #333;
        }
        .search-input::placeholder { color: #999; }
        .search-btn {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 30px; 
            background: linear-gradient(90deg, rgba(30,213,169,1) 0%, rgba(1,180,228,1) 100%);
            border: none;
            color: white;
            padding: 0 35px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        /* --- Bố cục Sidebar --- */
        .sidebar {
            background-color: #212121;
            color: #ccc;
            min-height: calc(100vh - 220px);
            padding: 20px 0;
        }
        
        .sidebar-title {
            color: white;
            font-weight: bold;
            font-size: 15px;
            padding: 0 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .sidebar-title i {
            margin-right: 8px;
        }

        .sidebar a {
            color: #ddd;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 14px;
        }
        
        .sidebar a:hover {
            background-color: #333;
            color: white;
        }

        /* --- Phần Form Nhập Liệu --- */
        .main-form-area {
            padding: 20px 30px 50px 30px; 
        }

        .form-title {
            color: #004aad; 
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 18px; 
        }

        .form-group label {
            font-weight: normal; 
            margin-bottom: 5px;
            color: #333;
            font-size: 15px;
        }

        .form-control {
            border-radius: 6px; 
            border: 1px solid #ced4da;
            padding: 8px 12px;
        }

        /* --- TÙY CHỈNH Ô CHỌN FILE --- */
        .custom-file-box {
            border: 1px solid #ced4da;
            border-radius: 6px;
            padding: 6px;
            display: flex;
            align-items: center;
            background-color: #fff;
            color: black;
        }
        .btn-browse {
            background-color: #efefef; 
            border: 1px solid #767676;
            border-radius: 3px;
            padding: 3px 8px;
            font-size: 13.5px;
            color: #333;
            cursor: pointer;
            margin-right: 10px;
            outline: none;
            font-weight: bold;
        }
        .btn-browse:hover {
            background-color: #e5e5e5;
        }
        .file-text {
            color: #555;
            font-size: 14px;
        }

        .btn-save {
            background-color: #007bff;
            border-color: #007bff;
            padding: 8px 30px;
            border-radius: 4px; 
            font-size: 15px;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        
        <div class="banner-section">
            <div class="banner-content">
                <h1>Welcome.</h1>
                <h4>Millions of movies, TV shows and people to discover. Explore now.</h4>
                
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="Nhập tên bộ phim yêu thích để tìm kiếm">
                    <button class="search-btn">Tìm kiếm</button>
                </div>
            </div>
        </div>

        <div class="row m-0">
            
            <div class="col-md-3 col-lg-2 p-0 sidebar">
                <div class="sidebar-title">
                    <i class="fas fa-list-alt"></i> Thể loại phim
                </div>
                <a href="#">Phim Hành Động</a>
                <a href="#">Phim Phiêu Lưu</a>
                <a href="#">Phim Hoạt Hình</a>
                <a href="#">Phim Hài</a>
                <a href="#">Phim Hình Sự</a>
                <a href="#">Phim Tài Liệu</a>
                <a href="#">Phim Chính Kịch</a>
                <a href="#">Phim Gia Đình</a>
            </div>

            <div class="col-md-9 col-lg-10 main-form-area">
                
                @if(session('success'))
                    <div class="alert alert-success w-100">{{ session('success') }}</div>
                @endif

                <h4 class="form-title">THÊM PHIM</h4>

                <form action="/movie/store" method="POST" enctype="multipart/form-data" class="w-100">
                    @csrf
                    
                    <div class="form-group">
                        <label>Tên tiếng Anh</label>
                        <input type="text" name="ten_tieng_anh" class="form-control" value="{{ old('ten_tieng_anh') }}">
                        @error('ten_tieng_anh') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tên tiếng Việt</label>
                        <input type="text" name="ten_tieng_viet" class="form-control" value="{{ old('ten_tieng_viet') }}">
                        @error('ten_tieng_viet') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Ngày phát hành</label>
                        <input type="text" name="ngay_phat_hanh" class="form-control" placeholder="" value="{{ old('ngay_phat_hanh') }}">
                        @error('ngay_phat_hanh') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea name="mo_ta" class="form-control" rows="2">{{ old('mo_ta') }}</textarea>
                        @error('mo_ta') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="custom-file-box">
                            <input type="file" name="anh_dai_dien" id="file_upload" style="display: none;" onchange="document.getElementById('file-text').innerText = this.files[0] ? this.files[0].name : 'No file selected.'">
                            
                            <button type="button" class="btn-browse" onclick="document.getElementById('file_upload').click()">Browse...</button>
                            <span id="file-text" class="file-text">No file selected.</span>
                        </div>
                        @error('anh_dai_dien') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-save">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>