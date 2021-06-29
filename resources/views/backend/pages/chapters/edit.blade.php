@extends('backend.master')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-8 col-sm-8  ">
                <div class="x_panel">
                    <div class="x_title">
                        @if (session('messages'))
                            <div class="alert alert-success">{{session('messages')}}</div>
                            {{session()->forget('messages')}}
                        @endif
                        <h2>Sửa chương</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{route('chapter.update',$chapter->ch_id)}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label  for="cate_id">Thuộc danh mục</label>
                                <div class="input-group">
                                    <select class="custom-select" id="loadBook" name="cate_id">
                                        <option  >Chọn danh mục ...</option>
                                        @foreach ($cates as $cate)
                                        <option
                                        {{$cate->c_id == $chapter->c_id ? 'selected' : ''}}
                                        value="{{$cate->c_id}}">{{Str::title($cate->c_name)}}</option> 
                                        @endforeach
                                        
                                    </select>
                                </div>
                                @if($errors->has('cate_id'))
                                    <div class="text-danger">{{ $errors->first('cate_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  for="ch_book_id">Thuộc truyện</label>
                                <div class="input-group">
                                    <select class="custom-select" id="ch_book_id" name="ch_book_id">
                                        <option  value="abc">Chọn danh mục ...</option>
                                        @foreach ($books as $book)
                                        <option 
                                        {{$book->b_id == $chapter->b_id ? 'selected' : ''}}
                                        value="{{$book->b_id}}">{{Str::title($book->b_name)}}</option>  
                                        @endforeach
                                        
                                    </select>
                                </div>
                                @if($errors->has('ch_book_id'))
                                    <div class="text-danger">{{ $errors->first('ch_book_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input type="text" class="form-control" name="ch_title" value="{{old('ch_title',$chapter->ch_title)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên truyện">
                                @if($errors->has('ch_title'))
                                    <div class="text-danger">{{ $errors->first('ch_title') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ch_content">Nội dung</label>
                                <textarea type="text" class="form-control ckeditor" name="ch_content"   id="ch_content" aria-describedby="emailHelp" placeholder="Nhập mô tả">{{old('ch_content',$chapter->ch_content)}}</textarea>
                                @if($errors->has('ch_content'))
                                    <div class="text-danger">{{ $errors->first('ch_content') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  for="inputGroupSelect01">Trạng thái</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="ch_active">
                                        @if ($chapter->ch_active == 1)
                                        <option selected value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                        @else
                                        <option  value="1">Hiện</option>
                                        <option selected value="0">Ẩn</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection