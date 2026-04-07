@extends('components.movie-layout')

@section('content')
<div class="list-movie">
    @if(isset($movies) && count($movies) > 0)
        @foreach($movies as $row) {{-- Đã sửa thành $movies --}}
        <div class="movie">
            <a href="{{ url('/chitiet/'.$row->id) }}">
                <img src="{{ asset('storage/' . $row->image) }}" style="width:100%; height:250px; object-fit:cover;">
                <div class="movie-info" style="padding:10px; text-align:left;">
                    <b style="font-size:14px; color:black">{{ $row->movie_name_vn }}</b><br>
                    <small style="color:gray">{{ $row->release_date }}</small>
                </div>
            </a>
        </div>
        @endforeach
    @else
        <div class="col-12"><p>Không tìm thấy bộ phim nào.</p></div>
    @endif
</div>
@endsection