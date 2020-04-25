<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tracks() {
        return $this->hasMany('App\Chanson', 'utilisateur_id');
    }

    public function following() {
        return $this->belongsToMany("App\User", "connexion", "follower_id", "followed_id");
        // SELECT * from users JOIN connexion ON follower_id=users.id WHERE follower_id=$this->id
    }

    public function followers() {
        return $this->belongsToMany('App\User', "connexion", "followed_id", "follower_id");
        // SELECT * FROM users JOIN connexion ON followed_id=$this_id WHERE follower_id=users.id
    }

    public function likes() {
        return $this->belongsToMany('App\Chanson', "likes", "user_id", "track_id")->count();
    }

    public function likesReceived() {
        $likesCount = 0;
        $tracks = $this->hasMany('App\Chanson', 'utilisateur_id');
        foreach($tracks as $track) {
            $likesCount += $track->likes()->count();
        }
        return $likesCount;

    }
}
