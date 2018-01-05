<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/12/29
 * Time: 11:38
 */

namespace App\Observers;

use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Article;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->body = clean($article->body, 'user_article_body');
        $article->excerpt = make_excerpt($article->body);
    }

    public function saved(Article $article)
    {
        if (!$article->slug) {
            dispatch(new TranslateSlug($article));
        }
    }

    public function deleted(Article $article)
    {
        \DB::table('articles')->where('article_id', $article->id)->delete();
    }
}