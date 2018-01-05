<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Reply;
use App\Observers\ArticleObserver;
use App\Observers\ReplyObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ArticleObserver::class);
        Reply::observe(ReplyObserver::class);
        \Carbon\Carbon::setLocale('zh');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
