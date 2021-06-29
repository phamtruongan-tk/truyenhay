@extends('backend.master')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row  d-flex">
            <div class="col-5 ml-auto">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
                        </div>
                        <select class="custom-select chose_cate" id="inputGroupSelect01" >
                            <option value="">Chọn danh mục ...</option>
                            <option value="{{route('book.index')}}">Tất cả </option>
                            @foreach ($cates as $cate)
                            <option value="{{route('getBookByCate',['c_id'=>$cate->c_id])}}">{{Str::title($cate->c_name)}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <form class="form-group d-flex" method="GET" action="{{route('searchBook')}}">
                    @csrf
                    <input type="text"  class="form-control search-book" name="keyBook" autocomplete="off" aria-describedby="emailHelp" placeholder="Nhập tên truyện ...">
                    <button class="btn btn-secondary d-inline">Tìm</button>
                </form>
            </div>
        </div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        @if (session('messages'))
                            <div class="alert alert-success">{{session('messages')}}</div>
                            {{session()->forget('messages')}}
                        @endif
                        <h2>Danh sách truyện</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Danh mục </th>
                                        <th class="column-title">Tên </th>
                                        <th class="column-title">Ảnh </th>
                                        <th class="column-title">Tác giả </th>
                                        <th class="column-title">Trạng thái </th>
                                        <th class="column-title">Tùy chọn </th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($books as $book)  
                                    <tr class="even pointer">
                                        <td class=" ">{{Str::title($book->c_name)}}</td>
                                        <td class=" ">{{Str::title($book->b_name)}}</td>
                                        <td class=" "><img src="public/uploads/books/{{$book->b_img}}" alt=""></td>
                                        <td class=" ">{{Str::title($book->b_author)}}</td>
                                        <td class=" ">{{$book->b_active == 1 ? 'Hiện' : 'Ẩn'}} </td>
                                        <td class=" ">
                                            <a  class="btn btn-warning btn-sm" href="{{route('book.show',$book->b_id)}}"><i class="far fa-eye"></i></a>
                                            <a  class="btn btn-success btn-sm" href="{{route('book.edit',$book->b_id)}}"><i class="far fa-edit"></i></a>
                                            <form action="{{route('book.destroy',$book->b_id)}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE') 
                                                <button onclick="return confirm('Bạn có muốn xóa truyện')" class="btn btn-danger btn-sm" ><i class="far fa-trash-alt"></i></button>
                                            </form>
                                           
                                        </td>
                                    </tr> 
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            {{$books->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection