
@extends('frontend.master')
@section('content')
<div class="main">
    <div class="container ">
        <div class="row mt-3 content"> 
                <div class="col-lg-12 col-md-12 col-12   ">
                    <div class="content-left">
                        <h5><a class="text-light" href="{{route('getHome')}}">Truyện Hay </a> / <a class="text-light" href="{{route('cate',['c_slug'=>$chapter->c_slug, 'c_id'=>$chapter->c_id])}}"> {{Str::title($chapter->c_name)}} </a> / <a class="text-light" href="{{route('book',['c_slug'=>$chapter->c_slug,'b_slug'=>$chapter->b_slug, 'b_id'=>$chapter->b_id])}}"> {{Str::title($chapter->b_name)}} </a>/ {{Str::title($chapter->ch_title)}}</h5>
                        <div class="row">
                            <div class="col-6 ml-2" >
                                @if ($prev !='')
                                <a href="{{route('chapter',['c_slug'=>$prev->c_slug,'b_slug'=>$prev->b_slug,'ch_slug'=>$prev->ch_slug,'ch_id'=>$prev->ch_id])}}" class="btn btn-success btn-sm">Chương trước</a>
                                @endif
                                
                                <div class="form-group">
                                    <div class="input-group my-3">
                                        <select class="custom-select load-chapter" id="inputGroupSelect01 ">
                                            <option >Chọn Chương ...</option>
                                            @foreach ($chapters as $ch)
                                            <option value="{{route('chapter',['c_slug'=>$ch->c_slug,'b_slug'=>$ch->b_slug,'ch_slug'=>$ch->ch_slug,'ch_id'=>$ch->ch_id])}}">{{$ch->ch_title}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                                @if ($next !='')
                                <a href="{{route('chapter',['c_slug'=>$next->c_slug,'b_slug'=>$next->b_slug,'ch_slug'=>$next->ch_slug,'ch_id'=>$next->ch_id])}}" class="btn btn-success btn-sm">Chương sau</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="content">
                                    <div class="name">
                                        {{Str::title($chapter->ch_title)}}
                                    </div>
                                    <p>
                                        {!!$chapter->ch_content!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 ml-2" >
                                @if ($prev !='')
                                <a href="{{route('chapter',['c_slug'=>$prev->c_slug,'b_slug'=>$prev->b_slug,'ch_slug'=>$prev->ch_slug,'ch_id'=>$prev->ch_id])}}" class="btn btn-success btn-sm">Chương trước</a>
                                @endif
                                
                                <div class="form-group">
                                    <div class="input-group my-3">
                                        <select class="custom-select load-chapter" id="inputGroupSelect01 ">
                                            <option >Chọn Chương ...</option>
                                            @foreach ($chapters as $ch)
                                            <option value="{{route('chapter',['c_slug'=>$ch->c_slug,'b_slug'=>$ch->b_slug,'ch_slug'=>$ch->ch_slug,'ch_id'=>$ch->ch_id])}}">{{$ch->ch_title}}</option>
                                            @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                                @if ($next !='')
                                <a href="{{route('chapter',['c_slug'=>$next->c_slug,'b_slug'=>$next->b_slug,'ch_slug'=>$next->ch_slug,'ch_id'=>$next->ch_id])}}" class="btn btn-success btn-sm">Chương sau</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
        </div>
    </div>
</div>
@endsection