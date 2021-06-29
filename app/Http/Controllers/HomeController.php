<?php

namespace App\Http\Controllers;

use App\Book;
use App\Cate;
use App\Chapter;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome(){
        $data['books'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_name','cates.c_slug')
        ->orderBy('b_id','desc')->where('books.b_active',1)->take(12)->get();

        return view('frontend.pages.home',$data);
    }
    public function getCate($c_slug,$c_id){
        $data['cate'] = Cate::where('c_id',$c_id)->select('c_name')->first();
        $data['books'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_name','cates.c_slug')
        ->orderBy('b_id','desc')->where('b_cate_id',$c_id)->where('books.b_active',1)->paginate(12);

        return view('frontend.pages.cate',$data);
    }
    public function getBook($c_slug,$b_slug,$b_id){
        $book = Book::find($b_id);
        $book->b_view +=1;
        $book->save();

        $data['book'] = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->select('books.*','cates.c_name','cates.c_slug','cates.c_id')
        ->where('books.b_id',$b_id)->where('books.b_active',1)->first();

        $data['chapters'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_slug','cates.c_slug')
        ->where('chapters.ch_book_id',$b_id)->where('chapters.ch_active',1)->get();

        return view('frontend.pages.detail',$data);
    }
    public function getChapter($c_slug,$b_slug,$ch_slug,$ch_id){
        $data['chapter'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_slug','books.b_id','books.b_name','cates.c_slug','cates.c_id','cates.c_name')
        ->where('chapters.ch_id',$ch_id)->where('chapters.ch_active',1)->first();

        $data['chapters'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_slug','books.b_id','books.b_name','cates.c_slug','cates.c_id','cates.c_name')
        ->where('chapters.ch_book_id',$data['chapter']['b_id'])->where('chapters.ch_active',1)->get();

        $id_prev = Chapter::where('ch_id','<',$ch_id) ->where('chapters.ch_book_id',$data['chapter']['b_id'])->max('ch_id');
        $id_next = Chapter::where('ch_id','>',$ch_id) ->where('chapters.ch_book_id',$data['chapter']['b_id'])->min('ch_id');

       
        $data['prev'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_slug','cates.c_slug')
        ->where('chapters.ch_book_id',$data['chapter']['b_id'])
        ->where('chapters.ch_id',$id_prev)->first();

        $data['next'] = Chapter::join('books','books.b_id','=','chapters.ch_book_id')
        ->join('cates','cates.c_id','=','books.b_cate_id')
        ->select('chapters.*','books.b_slug','cates.c_slug')
        ->where('chapters.ch_book_id',$data['chapter']['b_id'])
        ->where('chapters.ch_id',$id_next)->first();
        
            return view('frontend.pages.read',$data);
    }

    public function search(){
        $data['key']= $_GET['key'];
        $key= $_GET['key'];
        
        $data['books'] = Book::join('cates','cates.c_id','books.b_cate_id')
        ->where('books.b_name','LIKE',"%$key%")->orWhere('books.b_author','LIKE',"%$key%")
        ->select('books.*','cates.c_id','cates.c_slug')
        ->get();

        return view('frontend.pages.search',$data);
    }
}
