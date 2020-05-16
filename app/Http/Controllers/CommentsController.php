<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Article;
use Auth;
use Validator;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //コンストラクタ （このクラスが呼ばれると最初にこの処理をする）
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        // $params = $request->validate([
        //     'article_id' => 'required|exists:posts,id',
        //     'body' => 'required|max:2000',
        // ]);

        // $article = Article::findOrFail($params['article_id']);
        // $article->comments()->create($params);
        // return redirect()->route('article.show', ['article' => $article]);
        // Commentモデル作成
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    public function destroy(Request $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/');
    }
}
