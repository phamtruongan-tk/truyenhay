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
                <div class="col-lg-12 col-md-12 col-12   ">
                    <div class="content-left">
                        <h5><i class="fas fa-list"></i> Kết quả tìm kiếm: {{$key}}</h5>
                        <div class="row ">
                            <div class="col-12">
                                <table class="table table-striped m-0">
                                    <tbody>
                                        @foreach ($books as $book)
                                        <tr>
                                            <td><a class="text-dark" href="{{route('book',['c_slug'=>$book->c_slug,'b_slug'=>$book->b_slug,'b_id'=>$book->b_id])}}">{{Str::title($book->b_name)}}</a></td>
                                            <td>Tác giả: {{Str::title($book->b_author)}}</td>
                                            <td>  <i class="far fa-eye"></i>  {{$book->b_view}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>
</div>
@endsection