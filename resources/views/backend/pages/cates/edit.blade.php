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
                        <h2>Sửa danh mục</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{route('cate.update',$cate->c_id)}}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" name="c_name" value="{{old('c_name',$cate->c_name)}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                                @if($errors->has('c_name'))
                                    <div class="text-danger">{{ $errors->first('c_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  for="inputGroupSelect01">Trạng thái</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="c_active">
                                        @if ($cate->c_active == 1)
                                        <option selected value="1">Hiện</option>
                                        <option value="0">Ẩn</option>
                                        @else
                                        <option value="1">Hiện</option>
                                        <option selected value="0">Ẩn</option>
                                        @endif
                                        
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