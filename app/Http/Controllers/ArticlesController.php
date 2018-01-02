<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/12/27
 * Time: 10:54
 */

namespace App\Http\Controllers;


use App\Handlers\ImageUploadHandler;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request, Article $article)
    {
        $articles = $article->withOrder($request->order)->simplePaginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show(Request $request, Article $article)
    {
        // URL 矫正
        if (!empty($article->slug) && $article->slug != $request->slug) {
            return redirect($article->link(), 301);
        }

        return view('articles.show', compact('article'));
    }

    public function create(Article $article)
    {
        $categories = Category::all();
        return view('articles.create_and_edit', compact('article', 'categories'));
    }

    public function store(ArticleRequest $request, Article $article, ImageUploadHandler $imageUploadHandler)
    {
        $article->fill($request->all());
        $article->user_id = Auth::id();
        if ($request->image) {
            $result = $imageUploadHandler->save($request->image, 'articles', Auth::id(), 1024);
            if ($result) {
                $article->image = $result['path'];
            }
        }
        $article->save();
        return redirect()->to($article->link())->with('message', '文章发表成功！');
    }

    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        $categories = Category::all();
        return view('articles.create_and_edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article, ImageUploadHandler $imageUploadHandler)
    {
        $this->authorize('update', $article);
        if ($request->image) {
            $result = $imageUploadHandler->save($request->image, 'articles', Auth::id(), 1024);
            if ($result) {
                $article->image = $result['path'];
            }
        }
        $article->update($request->all());
        return redirect()->to($article->link())->with('message', '修改成功.');
    }

    public function destroy(Article $article)
    {
        $this->authorize('destroy', $article);
        $article->delete();

        return redirect()->route('articles.index')->with('message', '删除成功.');
    }

    public function uploadImage(Request $request, ImageUploadHandler $imageUploadHandler)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            $result = $imageUploadHandler->save($file, 'articles', Auth::id(), 1024);
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg'] = "上传成功!";
                $data['success'] = true;
            }
        }
        return $data;
    }

}
