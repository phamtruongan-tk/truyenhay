<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cate;
use App\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }
    public function postLogin(Request $request){
        $data = [
            'email'=>$request->email,
            'password'=>$request->password  
        ];
        if($request->remember = 'remember'){
            $remember = true;
        }
        else{
            $remember = false;
        }
        if(Auth::attempt($data,$remember)){
            return Redirect::route('getDashBoard');
        }else{
            session()->put('messages','Sai tài khoảng hoặc mật khẩu');
            return Redirect::back();
        }
    }
    public function getLogout(){
        Auth::logout();
        return Redirect::route('getLogin');
    }
    public function getDashBoard(){
        $data['books'] = Book::orderBy('b_view','desc')->take(20)->get();
        return view('backend.pages.dashboard',$data);
    }

    public function getBookByCate($c_id){
        $data['books'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_name')
        ->orderBy('books.b_id','desc')
        ->where('books.b_cate_id',$c_id)
        ->paginate(5);
        
        return view('backend.pages.books.filter',$data);
    }
    
    public function getChapterByBook($b_id){
        $data['chapters'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','cates.c_name','books.b_name')
        ->orderBy('chapters.ch_id','desc')
        ->where('chapters.ch_book_id',$b_id)
        ->paginate(10);

        $data['books']= Book::all();
        return view('backend.pages.chapters.filter',$data);
    }
    public function searchBook(){
        $key = $_GET['keyBook'];
        $data['books'] = Book::join('cates','cates.c_id','books.b_cate_id')
        ->where('books.b_name','LIKE',"%$key%")
        ->select('books.*','cates.c_name')
        ->get();
        return view('backend.pages.books.search',$data);
    }
    public function searchChapter(){
        $key = $_GET['keyChapter'];
        $data['chapters'] = Chapter::join('Books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->where('chapters.ch_title','LIKE',"%$key%")
        ->select('chapters.*','cates.c_name','books.b_name')
        ->get();
        $data['books'] = Book::orderBy('b_id','desc')->get();
        return view('backend.pages.chapters.search',$data);
    }
    
}
