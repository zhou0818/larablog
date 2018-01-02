<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction',
        'avatar',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function isAuthorOf($model)
    {
        return $this->id == $model->user_id;
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
