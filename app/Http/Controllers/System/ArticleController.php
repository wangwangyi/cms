<?php

namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Category;
use Validator;
class ArticleController extends CommonController
{
    private function messages()
    {
        return [
            'title.required' => '标题不能为空！',
            'category_id.required' => '分类不能为空！',
        ];
    }

    public function index(Request $request)
    {
        $where = function($query) use ($request){
            if ($request->has('title') and $request->title != '') {
                $search = "%" . $request->title . "%";
                $query->where('title', 'like', $search);
            }

            if ($request->has('category_id') and $request->category_id != '-1') {
                $query->where('category_id', $request->category_id);
            }

        };
        $articles = Article::with('category')->where($where)->paginate(12);
        $categories = Category::get_categories();
        return view('admin.article.index')->with('articles',$articles)
                                             ->with('categories',$categories);
    }

    public function create()
    {
        $categories = Category::get_categories();
        return view('admin.article.create')->with('categories',$categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Article::create($request->all());
        return redirect(route('admin.article.index'))->with('msg','新增内容成功');
    }

    public function edit($id)
    {
        $categories = Category::get_categories();
        $article = Article::find($id);
        return view('admin.article.edit')->with('categories',$categories)
                                            ->with('article',$article);
    }

    public function update(Request $request,$id)
    {
        $article =Article::find($id);
        $article->update($request->all());
        return redirect(route('admin.article.index'))->with('msg','编辑成功');
    }

    public function delete(Request $request)
    {
        Article::destroy($request->article_id);
    }

    public function checked_del(Request $request)
    {
        Article::destroy($request->checked_id);
    }
}
