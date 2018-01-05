<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReplyRequest;
use App\Models\Reply;
use Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function store(ReplyRequest $request, Reply $reply)
    {
        $reply->contents = $request->contents;
        $reply->user_id = Auth::id();
        $reply->article_id = $request->article_id;
        $reply->save();

        return redirect()->to($reply->article->link())->with('success', '回复成功！');
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->to($reply->article->link())->with('success', '删除成功！');
    }
}
