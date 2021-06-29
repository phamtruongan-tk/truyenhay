<?php

namespace App\Http\Controllers;

use App\Cate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cates'] = Cate::orderBy('c_id','desc')->paginate(5);
        
        return view('backend.pages.cates.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
                'c_name'=>'required|max:255|unique:cates,c_name'
            ],
            [
                'c_name.required'=>'Không được để trống',
                'c_name.unique'=>'Tên danh mục đã bị trùng',
                'c_name.max'=>'Tên quá dài',
            ]
        );
        $cate = new Cate();
        $cate->c_name = $valid['c_name'];
        $cate->c_slug = Str::slug($valid['c_name'], '-');
        $cate->c_active = $request->c_active;
        $cate->save();

        session()->put('messages','Đã thêm danh mục');
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['cate'] =Cate::find($id);
        return view('backend.pages.cates.edit',$data);
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
                'c_name'=>'required|max:255|unique:cates,c_name,'.$id.',c_id'
            ],
            [
                'c_name.required'=>'Không được để trống',
                'c_name.unique'=>'Tên danh mục đã bị trùng',
                'c_name.max'=>'Tên quá dài',

            ]
        );
        $cate = Cate::find($id);
        $cate->c_name = $valid['c_name'];
        $cate->c_slug = Str::slug($valid['c_name'], '-');
        $cate->c_active = $request->c_active;
        $cate->save();

        session()->put('messages','Đã sửa danh mục');
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
        Cate::find($id)->delete();
        session()->put('messages','Đã xóa danh mục');
        return Redirect::back();
    }
}
