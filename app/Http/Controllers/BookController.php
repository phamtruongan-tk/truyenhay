<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['books'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_name')
        ->orderBy('books.b_id','desc')
        ->paginate(5);

        $data['cates'] = Cate::orderBy('c_id','desc')->get();
        
        return view('backend.pages.books.list' ,$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $data['cates'] = Cate::orderBy('c_id','desc')->get();

        return view('backend.pages.books.add',$data);
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
                'b_name'=>'required|max:255|unique:books,b_name',
                'b_cate_id'=>'numeric',
                'b_summary'=>'required',
                'b_img'=>'required|mimes:jpg,jpeg,png,bmp,gif,svg',
                'b_author'=>'required|max:255'
            ],[
                'b_name.required'=>'Không được để trống',
                'b_name.unique'=>'Tên truyện đã bị trùng',
                'b_name.max'=>'Tên truyện quá dài',
                'b_cate_id.numeric'=>'Không được để trống',
                'b_summary.required'=>'Không được để trống',
                'b_img.required'=>'Không được để trống',
                'b_img.mimes'=>'Vui lòng chọn ảnh',
                'b_author.required'=>'Không được để trống',
                'b_author.max'=>'Tên tác giả quá dài'
            ]
        );
        $book = new Book();
        $book->b_cate_id = $valid['b_cate_id'];
        $book->b_name = $valid['b_name'];
        $book->b_slug = Str::slug($valid['b_name'], '-');
        $book->b_summary = $valid['b_summary'];
        $book->b_author = $valid['b_author'];
        $book->b_active = $request->b_active;
        $fileName = rand(0,100).'-'.$request->file('b_img')->getClientOriginalName();
        $book->b_img = $fileName;
        $request->file('b_img')->move('public/uploads/books/',$fileName);
        $book->save();

        session()->put('messages','Đã thêm truyện ');
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
        $data['book'] = Book::find($id);
        return view('backend.pages.books.view',$data);
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

        $data['book'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_id')->where('books.b_id',$id)->first();

        return view('backend.pages.books.edit',$data);
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
                'b_name'=>'required|max:255|unique:books,b_name,'.$id.',b_id',
                'b_cate_id'=>'numeric',
                'b_summary'=>'required',
                'b_img'=>'mimes:jpg,jpeg,png,bmp,gif,svg',
                'b_author'=>'required|max:255'
            ],[
                'b_name.required'=>'Không được để trống',
                'b_name.unique'=>'Tên truyện đã bị trùng',
                'b_name.max'=>'Tên truyện quá dài',
                'b_cate_id.numeric'=>'Không được để trống',
                'b_summary.required'=>'Không được để trống',
                'b_img.mimes'=>'Vui lòng chọn ảnh',
                'b_author.required'=>'Không được để trống',
                'b_author.max'=>'Tên tác giả quá dài'
            ]
        );
        $book = Book::find($id);
        $book->b_cate_id = $valid['b_cate_id'];
        $book->b_name = $valid['b_name'];
        $book->b_slug = Str::slug($valid['b_name'], '-');
        $book->b_summary = $valid['b_summary'];
        $book->b_author = $valid['b_author'];
        $book->b_active = $request->b_active;
        if($request->file('b_img')){
            $fileName = rand(0,100).'-'.$request->file('b_img')->getClientOriginalName();
            $book->b_img = $fileName;
            $request->file('b_img')->move('public/uploads/books/',$fileName);
        }
       
        $book->save();

        session()->put('messages','Đã sửa truyện ');
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
        $book = Book::find($id);
        $path = 'public/uploads/books/'.$book->b_img;
        unlink($path);
        Book::find($id)->delete();

        session()->put('messages','Đã xóa truyện ');
        return Redirect::back();
    }

   
}
