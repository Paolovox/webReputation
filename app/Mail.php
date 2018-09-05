<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail as eMail;
class Mail extends Model
{
    public static function sendWelcomeEmail(User $user)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);
        // Send email
        eMail::send('emails.lawyers.welcome', ['user' => $user, 'token' => $token], function ($m) use ($user) {
            $m->from('george@syrus.it', 'Cyberlex');
            $m->to($user->email, $user->name)->subject('Benvenuto in CyberLex');
        });
    }
}
