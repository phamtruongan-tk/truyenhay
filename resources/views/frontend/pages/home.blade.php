@extends('frontend.master')
@section('content')
<div class="main">
    <div class="container ">
        <div class="row mt-2">
            <div class="col-12">
                <div class="owl-carousel owl-theme d-block ">
                    @foreach ($slides as $slide)
                    <div class="item">
                        <a href="{{route('book',['c_slug'=>$slide->c_slug,'b_slug'=>$slide->b_slug,'b_id'=>$slide->b_id])}}" class="item-book">
                            <img src="public/uploads/books/{{$slide->b_img}}" alt="">
                            <div class="name">{{Str::title($slide->b_name)}} <br> Lượt xem : {{$slide->b_view}} </div>
                        </a>
                    </div>
                    @endforeach
                   
                </div>
            </div>
           
        </div>
        <div class="row mt-3 content"> 
                <div class="col-lg-9 col-md-9 col-12   ">
                    <div class="content-left">
                        <h5><i class="fas fa-list"></i> Truyện Mới Cập nhật</h5>
                        <div class="row ">
                            @foreach ($books  as $book)
                            <div class=" col-lg-4 col-md-6 col-sm-12">
                                <div class="item">
                                    <img src="public/uploads/books/{{$book->b_img}}" alt="">
                                    <div class="inf">
                                        <a href="{{route('book',['c_slug'=>$book->c_slug,'b_slug'=>$book->b_slug,'b_id'=>$book->b_id])}}" class="name">{{Str::title($book->b_name)}}</a>
                                        <div class="author">Tác giả: {{Str::title($book->b_author)}} </div>
                                        <div class="cate">Thể loại: {{Str::title($book->c_name)}} </div>
                                        <div class="cate">Lượt xem: {{Str::title($book->b_view)}} </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3 col-md-3 col-12   ">
                    <div class="content-right">
                        <h5>
                            <i class="fas fa-list"></i> Thể loại
                        </h5>
                        @foreach ($cates as $cate)
                        <a href="{{route('cate',['c_slug'=>$cate->c_slug,'c_id'=>$cate->c_id])}}"><i class="fas fa-angle-double-right"></i> {{Str::title($cate->c_name)}}</a>  
                        @endforeach
                        
                    </div>
                    
                </div>
        </div>
    </div>
</div>
@endsection