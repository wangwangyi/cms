<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Picture;

class PictureController extends CommonController
{
    public function index()
    {
        $pictures = Picture::get();
        return view('admin.focus.index')->with('pictures',$pictures);
    }

    public function create()
    {
        return view('admin.focus.create');
    }

    public function store(Request $request)
    {
        Picture::create($request->all());
        return redirect(route('admin.picture.index'))->with('msg','新增成功');
    }

    public function edit($id)
    {
        $picture = Picture::find($id);
        return view('admin.focus.edit')->with('picture',$picture);
    }

    public function update(Request $request,$id)
    {
        $picture = Picture::find($id);
        $picture->update($request->all());
        return redirect(route('admin.picture.index'))->with('msg', '编辑成功~');
    }

    public function delete(Request $request)
    {
        Picture::destroy($request->c_id);
    }
}
