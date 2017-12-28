<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/12/27
 * Time: 10:54
 */

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $articles = $article->withOrder($request->order)->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show(Request $request, Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
