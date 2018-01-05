<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2018/1/4
 * Time: 17:07
 */

namespace App\Observers;

use App\Models\Reply;
use App\Models\User;
use App\Notifications\ArticleReplied;

class ReplyObserver
{
    public function creating(Reply $reply)
    {
        $userNames = $reply->replySomebody($reply->contents);
        if ($userNames) {
            foreach ($userNames as $userName) {
                $user = User::where('name', $userName)->first();
                if ($user) {
                    $reply->contents = str_replace('@' . $userName,
                        '<a href="' . route('users.show', $user->id) . '">@' . $userName . ' </a>',
                        $reply->contents);
                }
            }
        }
        $reply->contents = clean($reply->contents, 'user_article_body');
    }

    public function created(Reply $reply)
    {
        $article = $reply->article;
        $article->increment('reply_count', 1);
        $userNames = $reply->replySomebody($reply->contents);
        if ($userNames) {
            foreach ($userNames as $userName) {
                $user = User::where('name', $userName)->first();
                if (!$user->isAuthorOf($article)) {
                    $user->notify(new ArticleReplied($reply));
                }
            }
        }
        if (!$reply->user->isAuthorOf($article)) {
            $article->user->notify(new ArticleReplied($reply));
        }
    }

    public function deleted(Reply $reply)
    {
        $reply->article->decrement('reply_count', 1);
    }
}