@extends('backend.master')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-4 col-sm-4  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm danh mục</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{route('cate.store')}}" method="POST">
                            @csrf 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" name="c_name" value="{{old('c_name')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                                @if($errors->has('c_name'))
                                    <div class="text-danger">{{ $errors->first('c_name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label  for="inputGroupSelect01">Trạng thái</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="c_active">
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
            <div class="col-md-8 col-sm-8  ">
                <div class="x_panel">
                    <div class="x_title">
                        @if (session('messages'))
                            <div class="alert alert-success">{{session('messages')}}</div>
                            {{session()->forget('messages')}}
                        @endif
                        <h2>Danh sách danh mục</h2>
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
                                        <th class="column-title">Tên </th>
                                        <th class="column-title">Trạng thái </th>
                                        <th class="column-title">Tùy chọn </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cates as $cate)
                                    <tr class="even pointer">
                                        <td class=" ">{{Str::title($cate->c_name)}}</td>
                                        <td class=" ">{{$cate->c_active == 1 ? 'Hiện' : 'Ẩn'}} </td>
                                        <td class=" ">
                                            <a  class="btn btn-success btn-sm" href="{{route('cate.edit',$cate->c_id)}}"><i class="far fa-edit"></i></a>
                                            <form action="{{route('cate.destroy', $cate->c_id)}}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có muốn xóa danh mục')" class="btn btn-danger btn-sm"  ><i class="far fa-trash-alt"></i></button>
                                            </form>
                                           
                                        </td>
                                    </tr> 
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            {{$cates->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection