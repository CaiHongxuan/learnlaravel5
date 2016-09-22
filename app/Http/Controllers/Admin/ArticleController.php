<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
    	return view('admin/article/index')->withArticles(Article::all());
    }

    /**
     * 新增文章
     * @return [type] [description]
     */
    public function create()
    {
    	return view('admin/article/create');
    }

    /**
     * 保存文章
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:articles|max:255',
    		'body'  => 'required',
    	]);

    	$article = new Article;
    	$article->title = $request->get('title');
    	$article->body  = $request->get('body');
    	$article->user_id = $request->user()->id;

    	if($article->save())
    	{
    		return redirect('admin/article');
    	} else {
    		return redirect()->back()->withInput()->withErrors('保存失败！');
    	}
    }

    /**
     * 编辑文章
     * @return [type] [description]
     */
    public function edit($id)
    {
    	return view('admin/article/edit')->withArticle(Article::find($id));
    }

    /**
     * 保存修改
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:articles,title,'.$id.'|max:255',
    		'body'  => 'required',
    	]);

    	$article = Article::find($id);
    	$article->title = $request->get('title');
    	$article->body  = $request->get('body');

    	if($article->save())
    	{
    		return redirect('admin/article');
    	} else {
    		return redirect()->back()->withInput()->withErrors('更新失败！');
    	}
    }

    /**
     * 删除文章
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	Article::find($id)->delete();
    	return redirect()->back()->withInput()->withErrors("删除成功！");
    }
}
