<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function getFollowing() {
        return $this->belongsToMany("App\User", "connexion", "follower_id", "followed_id");
        // SELECT * from users JOIN connexion ON followed_id=users.id WHERE follower_id=$this->id
    }

    public function getFollowers() {
        return $this->belongsToMany('App\User', "connexion", "followed_id", "follower_id");
    }

}
