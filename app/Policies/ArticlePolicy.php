<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2018/1/2
 * Time: 13:55
 */

namespace App\Policies;


use App\Models\Article;
use App\Models\User;

class ArticlePolicy extends Policy
{
    public function update(User $user, Article $article)
    {
        return $user->isAuthorOf($article);
    }

    public function destroy(User $user, Article $article)
    {
        return $user->isAuthorOf($article);
    }
}