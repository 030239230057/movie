<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('library/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .list-movie { display: grid; grid-template-columns: repeat(4, 25%); }
        .movie { margin: 10px; text-align: center; border-radius: 5px; border: 1px solid #dbdbdb; overflow: hidden; background: white; }
        .movie a { color: black; text-decoration: none; }
        .banner
            {
                width:100%;
                max-width:1200px;
                max-height:200px;
                height:65vh;
                background-image: url("{{ asset('storage/image/banner.jpg') }}");
                background-size:cover;
                color:white;
                margin:0 auto;
            }
        .search-input { width: 90%; position: relative; margin: 0 auto; }
        .search-input input { width: 100%; height: 40px; border-radius: 30px; border: none; padding-left: 20px; outline: none; }
        .search-btn { width: 100px; height: 40px; color: white; background-image: linear-gradient(to right, #1ed5a9 0%, #01b4e4 100%); border-radius: 30px; border: none; position: absolute; right: 0; cursor: pointer; }
        .list-group-movie a { padding: 10px; text-decoration: none; color: white; display: block; border-bottom: 1px solid #333; }
        .list-group-movie a:hover { background: #000; }
    </style>
</head>
<body style="background-color: #f8f9fa;">
    <header style="text-align:center">
        <div class="banner">
            <h2>Welcome.</h2>
            <div class="search-input">
                <form method="post" action="{{ url('/timkiem') }}">
                    @csrf
                    <input type="text" name="keyword" placeholder="Nhập tên phim..." required>
                    <button type="submit" class="search-btn">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </header>

    <main style="max-width:1200px; margin:20px auto;">
        <div class="row">
            <div class="col-3 pr-0">
                <div class="card" style="background-color:#222; color:white;">
                    <div class="card-header"><i class="fa fa-film"></i> <b>Thể loại phim</b></div>
                    <ul class="list-group list-group-flush list-group-movie">
                        @if(isset($genre))
                            @foreach($genre as $row)
                                <a href="{{ url('/theloai/'.$row->id) }}">{{ $row->genre_name_vn }}</a>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-9">
                @yield('content') {{-- Thay $slot bằng yield nếu dùng @extends --}}
            </div>
        </div>
    </main>
</body>
</html>
