<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AjaxController extends Controller
{
    public function loadBook($id){
        $output = '';
        $books = Book::where('b_cate_id',$id)->orderBy('b_id','desc')->get();
        
        foreach($books as $book){
            $output .=  ' <option value="'.$book->b_id.'">'.Str::title($book->b_name).'</option>  ';
        }
        echo $output;
    }

    public function search($key){
        // $key = Str::slug($key,'-');
        $books = Book::join('cates','cates.c_id','books.b_cate_id')
        ->where('books.b_name','LIKE',"%$key%")->orWhere('books.b_author','LIKE',"%$key%")
        ->select('books.*','cates.c_id','cates.c_slug')
        ->take(5)->get();

        
        $output = '';

        if(count($books) == 0){
            $output .= '
                <h6 class = "text-center mt-1">Không tìm thấy kết quả </h6>
            ';
        }else{
            foreach($books as $book){
                $output .= '
                    <li> 
                        <a href="'.route('book',['c_slug'=>$book->c_slug,'b_slug'=>$book->b_slug,'b_id'=>$book->b_id]).'">
                            <img src="public/uploads/books/'.$book->b_img.'" alt="">
                            <div class="inf">
                                <div class="name">'.Str::title($book->b_name).'</div>
                                <div class="author">Tác giả: '.Str::title($book->b_author).'</div>
                            </div>
                        </a>
                    </li>
                ';
            }
        }
        echo $output;
    }

    public function choseCate($c_id){
        $output = ' <option value="" >Chọn truyện </option>';
        $books = Book::where('b_cate_id',$c_id)->orderBy('b_id','desc')->get();
        foreach($books as $book){
            $output .= '
                <option value="'.route('getChapterByBook',['b_id'=>$book->b_id]).'">'.Str::title($book->b_name).'</option>
            ';
        }
        echo $output;
    }

}
