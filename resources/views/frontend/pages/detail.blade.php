@extends('frontend.master')
@section('content')
<div class="main">
    <div class="container ">
        <div class="row mt-2">
            <div class="col-12">
                <div class="owl-carousel owl-theme d-block ">
                    <div class="item">
                        <a href="" class="item-book">
                            <img src="img/nu-hon-cua-soi.jpg" alt="">
                            <div class="name">Nụ Hôn Của Sói <br> Số chương: 102</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="item-book">
                            <img src="img/phuong-kim-thien.jpg" alt="">
                            <div class="name">Phượng Thiên Kiêm  <br> Số chương: 102</div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="item-book">
                            <img src="img/quan-hon-chop-nhoang.jpg" alt="">
                            <div class="name">Phượng Thiên kiêm <br> Số chương: 102</div>
                        </a>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="row mt-3 content"> 
                <div class="col-lg-8 col-md-8 col-12   ">
                    <div class="content-left">
                        <h5><a class="text-light" href="{{route('getHome')}}">Truyện Hay</a>/ <a class="text-light" href="{{route('cate',['c_slug'=>$book->c_slug,'c_id'=>$book->c_id])}}">{{Str::title($book->c_name)}}</a>  / {{Str::title($book->b_name)}}</h5>
                        <div class="item-detail">
                            <img src="public/uploads/books/{{$book->b_img}}" alt="">
                            <div class="inf">
                                <div class="name">{{Str::title($book->b_name)}}</div>
                                <div class="author">Tác giả: {{Str::title($book->b_author)}} </div>
                                <div class="cate">Thể loại: {{Str::title($book->c_name)}} </div>
                                <div class="cate">Lượt xem: {{Str::title($book->b_view)}} </div>

                            </div>
                        </div>
                        <div class="summary">
                            <h6>Giới thiệu nội dung của {{Str::title($book->b_name)}}</h6>
                            <p>
                                {!!$book->b_summary!!}
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-12"  > 
                    <div class="content-right" >
                        <h5>
                            <i class="fas fa-list"></i> Danh sách chương
                        </h5>
                        @if (count($chapters) > 0)
                        @foreach ($chapters as $chapter)
                        <a href="{{route('chapter',['c_slug'=>$chapter->c_slug,'b_slug'=>$chapter->b_slug,'ch_slug'=>$chapter->ch_slug,'ch_id'=>$chapter->ch_id])}}"><i class="fas fa-angle-double-right"></i> {{Str::title($chapter->ch_title)}}</a>
                        @endforeach
                        @else
                           <p>Đang cập nhật ...</p> 
                        @endif
                       
                        
                    </div>
                    
                </div>
        </div>
    </div>
</div>
@endsection