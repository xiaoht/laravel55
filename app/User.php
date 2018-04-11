<?php

namespace App;

use App\Http\Models\Comment;
use App\Http\Models\Post;
use App\Http\Models\Zan;
use App\Http\Services\SendCloud;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        SendCloud::sendPasswordResetNotification($token , $this);
    }

    public function posts()
    {
        return $this->hasMany(Post::class , 'user_id' , 'id')->orderBy('created_at' , 'desc');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'user_id' , 'id')->orderBy('created_at' , 'desc');
    }

    public function zans()
    {
        return $this->hasMany(Zan::class , 'user_id' , 'id')->orderBy('created_at' , 'desc');
    }
}
