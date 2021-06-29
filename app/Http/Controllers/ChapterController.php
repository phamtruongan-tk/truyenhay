<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cate;
use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['chapters'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_name','cates.c_name')
        ->orderBy('chapters.ch_id','desc')->paginate(10);

        $data['cates'] = Cate::orderBy('c_id','desc')->get();
        $data['books'] = Book::orderBy('b_id','desc')->get();
        
        return view('backend.pages.chapters.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cates'] = Cate::orderBy('c_id','desc')->get();

        $data['books'] = Book::orderBy('b_id','desc')->get();
        
        return view('backend.pages.chapters.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate(
            [
                'cate_id'=>'numeric',
                'ch_book_id'=>'numeric',
                'ch_title'=>'required|max:255',
                'ch_content'=>'required',
            ],[
                'cate_id.numeric'=>'Không được để trống',
                'ch_book_id.numeric'=>'Không được để trống',
                'ch_title.required'=>'Không được để trống',
                'ch_title.max'=>'Tiêu đề quá dài',
                'ch_content.required'=>'Không được để trống',
            ]
        );
        $chapter = new Chapter();
        $chapter->ch_book_id = $valid['ch_book_id'];
        $chapter->ch_title = $valid['ch_title'];
        $chapter->ch_slug = Str::slug($valid['ch_title'],'-');
        $chapter->ch_content = $valid['ch_content'];
        $chapter->ch_active = $request->ch_active;
        $chapter->save();

        session()->put('messages','Đã thêm chương');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['chapter'] = Chapter::find($id);
        return view('backend.pages.chapters.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cates'] = Cate::orderBy('c_id','desc')->get();

        $data['books'] = Book::orderBy('b_id','desc')->get();

        $data['chapter'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_id','cates.c_id')
        ->where('chapters.ch_id',$id)->first();

        return view('backend.pages.chapters.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = $request->validate(
            [
                'cate_id'=>'numeric',
                'ch_book_id'=>'numeric',
                'ch_title'=>'required|max:255',
                'ch_content'=>'required',
            ],[
                'cate_id.numeric'=>'Không được để trống',
                'ch_book_id.numeric'=>'Không được để trống',
                'ch_title.required'=>'Không được để trống',
                'ch_title.max'=>'Tiêu đề quá dài',
                'ch_content.required'=>'Không được để trống',
            ]
        );  
        $chapter = Chapter::find($id);
        $chapter->ch_book_id = $valid['ch_book_id'];
        $chapter->ch_title = $valid['ch_title'];
        $chapter->ch_slug = Str::slug($valid['ch_title'],'-');
        $chapter->ch_content = $valid['ch_content'];
        $chapter->ch_active = $request->ch_active;
        $chapter->save();

        session()->put('messages','Đã sửa chương');
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        session()->put('messages','Đã xóa truyện ');
        return Redirect::back();
    }
}
