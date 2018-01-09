<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;

    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $url = url('password/reset', $this->token);
        return (new MailMessage)
            ->subject('Mr.Zhou Blog密码重置')
            ->line('您正在 Mr.Zhou Blog 重置密码，请点击下方按钮进行操作。')
            ->action('重置密码', $url);
    }
}
