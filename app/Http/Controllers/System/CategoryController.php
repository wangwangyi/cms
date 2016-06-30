<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends CommonController
{
    private function messages()
    {
        return [
            'name.required' => '分类名称不能为空！',
        ];
    }
    public function index()
    {
        $categories = Category::get_categories();
        return view('admin.category.index')->with('categories',$categories);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Category::create($request->all());
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg', '添加栏目成功');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit')->with('category',$category);
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->update($request->all());
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg', '编辑成功~');
    }

    public function delete(Request $request)
    {
        Category::destroy($request->c_id);
        Category::clear();
    }


}
