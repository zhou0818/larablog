<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Category $category, Request $request, Article $article)
    {
        $articles = $article->withOrder($request->order)->where('category_id', $category->id)->simplePaginate(10);
        return view('articles.index', compact('articles', 'category'));
    }
}
