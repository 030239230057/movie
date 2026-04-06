<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="{{ asset('library/bootstrap.min.css') }}">
        <script src="{{ asset('library/jquery.slim.min.js') }}"></script>
        <script src="{{ asset('library/popper.min.js') }}"></script>
        <script src="{{ asset('library/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{ asset('library/jquery-3.7.1.js') }}"></script>

        <style>
            /* --- Cấu trúc danh sách phim --- */
            .list-movie {
                display: grid;
                grid-template-columns: repeat(4, 25%);
            }

            .movie {
                margin: 10px;
                text-align: center;
                border-radius: 5px;
                border: 1px solid #dbdbdb;
                overflow: hidden;
                cursor: pointer;
            }

            .movie a {
                color: black;
                text-decoration: none;
            }

            .movie-info {
                display: grid;
                grid-template-columns: 30% 70%;
            }

            /* --- PHẦN BANNER (ĐÃ SỬA ĐƯỜNG DẪN) --- */
            .banner {
                width: 100%;
                max-width: 1200px;
                max-height: 400px; /* Tăng chiều cao để nhìn rõ banner hơn */
                height: 60vh;
                /* Laravel storage:link sẽ biến 'storage/app/public' thành 'storage/' ngoài trình duyệt */
                background-image: url('{{ asset("storage/images/banner.jpg") }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: white;
                margin: 0 auto;
                display: flex;
                flex-direction: column;
                justify-content: center;
                position: relative;
            }