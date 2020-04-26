<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Chanson;
use App\Contient;

class Playlist extends Model
{
    protected $table = 'playlist';

    public function utilisateur() {
        return $this->belongsTo("App\User", "utilisateur_id");
    }

    public function tracks() {
        return $this->belongsToMany('App\Chanson', 'contient');
    }
}
