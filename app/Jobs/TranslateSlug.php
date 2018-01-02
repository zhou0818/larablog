<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Models\Article;
use App\Handlers\SlugTranslateHandler;

class TranslateSlug implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }


    public function handle()
    {
        $slug = app(SlugTranslateHandler::class)->translate($this->article->title);
        \DB::table('articles')->where('id', $this->article->id)->update(['slug' => $slug]);
    }
}
