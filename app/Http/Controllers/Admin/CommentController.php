<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentController extends Controller
{
	/**
	 * 显示所有评论
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('admin/comment/index')->withComments(Comment::all());
    }

    /**
     * 编辑评论
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function edit($id)
    {
    	return view('admin/comment/edit')->withComment(Comment::find($id));
    }

    /**
     * 更新评论
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
    	$this->validate($request, [
			'nickname' => 'required|max:255',
			'content'  => 'required',
    	]);
    	$comment = Comment::find($id);
    	$comment->nickname = $request->get('nickname');
    	$comment->email = $request->get('email');
    	$comment->website = $request->get('website');
    	$comment->content = $request->get('content');

    	if($comment->save())
    	{
    		return redirect('admin/comment');
    	} else {
    		return redirect()->back()->withInput()->withErrors('更新失败！');
    	}
    }

    /**
     * 删除评论
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function destroy($id)
    {
    	Comment::find($id)->delete();
    	return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
