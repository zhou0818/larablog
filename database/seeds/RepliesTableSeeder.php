<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = app(\Faker\Generator::class);
        $user_ids = User::all()->pluck('id')->toArray();
        $article_ids = Article::all()->pluck('id')->toArray();
        $replies = factory(Reply::class)
            ->times(1000)
            ->make()
            ->each(function ($reply, $index)
            use ($user_ids, $article_ids, $faker) {
                $reply->user_id = $faker->randomElement($user_ids);
                $reply->article_id = $faker->randomElement($article_ids);
            });
        Reply::insert($replies->toArray());
    }
}
