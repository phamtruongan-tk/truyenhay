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
                        <h2>Thêm truyện</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="form-group">
                                <label  for="b_cate_id">Thuộc danh mục</label>
                                <div class="input-group">
                                    <select class="custom-select" id="b_cate_id" name="b_cate_id">
                                        <option selected value="abc">Chọn danh mục ...</option>
                                        @foreach ($cates as $cate)
                                        <option value="{{$cate->c_id}}">{{Str::title($cate->c_name)}}</option>    
                                        @endforeach
                                        
                                    </select>
                                </div>
                                @if($errors->has('b_cate_id'))
                                    <div class="text-danger">{{ $errors->first('b_cate_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" name="b_name" value="{{old('b_name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên truyện">
                                @if($errors->has('b_name'))
                                    <div class="text-danger">{{ $errors->first('b_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="b_summary">Tóm tắt</label>
                                <textarea type="text" class="form-control ckeditor" name="b_summary"   id="b_summary" aria-describedby="emailHelp" placeholder="Nhập mô tả">{{old('b_summary')}}</textarea>
                                @if($errors->has('b_summary'))
                                    <div class="text-danger">{{ $errors->first('b_summary') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="b_img">Ảnh</label>
                                <input type="file" class="form-control" name="b_img"  id="b_img" aria-describedby="emailHelp" >
                                @if($errors->has('b_img'))
                                    <div class="text-danger">{{ $errors->first('b_img')}}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="b_author">Tác giả</label>
                                <input type="text" class="form-control" name="b_author" value="{{old('b_author')}}" id="b_author" aria-describedby="emailHelp" placeholder="Nhập tác giả">
                                @if($errors->has('b_author'))
                                    <div class="text-danger">{{ $errors->first('b_author') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  for="inputGroupSelect01">Trạng thái</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="b_active">
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection