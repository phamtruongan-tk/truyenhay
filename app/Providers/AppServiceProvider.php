<?php

namespace App\Providers;

use App\Book;
use App\Cate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $cates = Cate::where('c_active',1)->get();

        $slides = Book::join('cates','cates.c_id','=','books.b_cate_id')
        ->where('books.b_active',1)->orderBy('books.b_view','desc')->take(20)->select('books.*','cates.c_slug')->get();
        return View::share([
            'cates'=>$cates,
            'slides'=>$slides
        ]);
    }
}
