<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2018/1/5
 * Time: 15:16
 */

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use App\Models\Reply;

class ReplyPolicy extends Policy
{
    public function destroy(User $user, Reply $reply, Article $article)
    {
        return $user->isAuthorOf($reply) || $user->isAuthorOf($article);
    }
}