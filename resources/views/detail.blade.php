@extends('components.movie-layout')

@section('content')
<div class="container mt-4">
    <div class="row bg-white p-4 shadow-sm rounded border">
        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/' . $movie->image) }}" 
                 class="img-fluid rounded" 
                 style="width: 100%; max-width: 280px;"
                 alt="{{ $movie->movie_name_vn }}">
        </div>

        <div class="col-md-8">
            <h4 class="fw-bold mb-3">{{ $movie->movie_name_vn }}</h4>
            
            <div style="font-size: 15px;">
                <p>Ngày phát hành: <b>{{ $movie->release_date }}</b></p>
                <p>Quốc gia: <b>{{ $movie->country_name ?? 'Đang cập nhật' }}</b></p>
                <p>Thời gian: <b>{{ $movie->runtime }} phút</b></p>
                <p>Doanh thu: <b>{{ number_format($movie->revenue) }}</b></p>
                
                <p class="mt-3 mb-1"><b>Mô tả:</b></p>
                <p style="text-align: justify; color: #555;">
                    {{ $movie->overview_vn ?? 'Chưa có nội dung mô tả tiếng Việt.' }}
                </p>
            </div>

            @if(isset($movie->trailer) && $movie->trailer != '')
                <div class="mt-3">
                    <a href="{{ $movie->trailer }}" class="btn btn-success btn-sm px-4" target="_blank">
                        Xem trailer
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection