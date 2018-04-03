<?php

namespace App\Http\Services;

use Mail;
use Naux\Mail\SendCloudTemplate;

class SendCloud
{
    public static function sendActiveEmail($user)
    {
        $data = [
            'url' => route('email.verify' , ['token' => $user->confirmation_token]),
            'name' => $user->name,
        ];
        $template = new SendCloudTemplate('xiaohtstyle_active', $data);

        $res = Mail::raw($template, function ($message) use ($user) {
            $message->from('xiaohaitao_1995@163.com', '海涛个人style');

            $message->to($user->email);
        });
    }

    public static function sendPasswordResetNotification($token , $user)
    {
        $data = [
            'url' => url('password/reset' , $token),
        ];
        $template = new SendCloudTemplate('xiaohtstyle_reset_password', $data);
        Mail::raw($template, function ($message) use ($user) {
            $message->from('xiaohaitao_1995@163.com', 'haitaostyle');
            $message->to($user->email);
        });
    }
}
