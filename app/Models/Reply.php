<?php

namespace App\Models;


class Reply extends Model
{
    protected $fillable = ['content'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replySomebody($contents)
    {
        $pattern = '/@(\S+)\s*/iu';
        if (preg_match_all($pattern, $contents, $matches)) {
            return $matches[1];
        }
        return false;
    }
}
