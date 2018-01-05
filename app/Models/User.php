<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable {
        notify as protected laravelNotify;
    }

    public function notify($instance)
    {
        // 如果要通知的人是当前用户，就不必通知了！
        if ($this->id == Auth::id()) {
            return;
        }
        $this->increment('notification_count');
        $this->laravelNotify($instance);
    }


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

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsRead()
    {
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }
}
