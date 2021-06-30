@extends('backend.master')
@section('content')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
        <div class="tile_count">
            <div class="col-12 mb-5">
                <h4>Danh Sách Truyên Được Xem Nhiều Nhất</h4>
            </div>
            @foreach ($books as $book)
            <div class="col-md-3 col-sm-3  tile_stats_count">
                <span class="count_top"> {{Str::title($book->b_name)}}</span>
                <div class="count"><i class="far fa-eye mr-3"></i> {{$book->b_view}}</div>
                <span class="count_bottom"><i class="fas fa-user"></i> {{Str::title($book->b_author)}}</span>
            </div>
            @endforeach
           
        </div>
    </div>
    <!-- /top tiles -->
</div>
@endsection