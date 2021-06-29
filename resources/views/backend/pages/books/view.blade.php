@extends('backend.master')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chi tiết truyện</h2>
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
                                        <th class="column-title">Mục </th>
                                        <th class="column-title">Thông tin </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="even pointer">
                                        <td class=" ">Tóm tắt</td>
                                        <td class=" ">
                                            {!!$book->b_summary!!}
                                        </td>
                                    </tr> 
                                    <tr class="even pointer">
                                        <td class=" ">Tùy chọn</td>
                                        <td class=" ">
                                            <a  class="btn btn-success btn-sm" href="{{route('book.edit',$book->b_id)}}"><i class="far fa-edit"></i></a>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection