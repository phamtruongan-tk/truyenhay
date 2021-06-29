<?php

use App\Book;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Support\Facades\Route;
use Symfony\Component\CssSelector\Node\FunctionNode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'getLogin'])->name('getLogin');
    Route::post('/',[AdminController::class,'postLogin'])->name('postLogin');
    Route::get('dashboard',[AdminController::class,'getDashBoard'])->name('getDashBoard');
    Route::get('logout',[AdminController::class,'getLogout'])->name('getLogout');

    Route::get('getBookByCate/{c_id}',[AdminController::class,'getBookByCate'])->name('getBookByCate');
    Route::get('getChapterByBook/{b_id}',[AdminController::class,'getChapterByBook'])->name('getChapterByBook');
    Route::get('/searchBook',[AdminController::class,'searchBook'])->name('searchBook');
    Route::get('/searchChapter',[AdminController::class,'searchChapter'])->name('searchChapter');


    Route::resource('cate',CateController::class)->except('create','show');
    Route::resource('book',BookController::class);
    Route::resource('chapter',ChapterController::class);
});

Route::prefix('ajax')->group(function(){
    Route::get('/{id}',[AjaxController::class,'loadBook']); //trang thêm chương
    Route::get('/search/{key}',[AjaxController::class,'search']); //tìm kiếm trng chủ
    Route::get('/choseCate/{c_id}',[AjaxController::class,'choseCate']); //lọc truyện theo danh mục ở trang danh sách chương
});



// frontend
Route::get('/',[HomeController::class,'getHome']);
Route::get('trang-chu',[HomeController::class,'getHome'])->name('getHome');
Route::get('/{c_slug}/{c_id}',[HomeController::class,'getCate'])->name('cate');
Route::get('/{c_slug}/{b_slug}/{b_id}',[HomeController::class,'getBook'])->name('book');
Route::get('/{c_slug}/{b_slug}/{ch_slug}/{ch_id}',[HomeController::class,'getChapter'])->name('chapter');

Route::get('/search',[HomeController::class,'search'])->name('search');


