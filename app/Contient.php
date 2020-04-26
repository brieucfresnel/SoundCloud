<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contient extends Model
{
    public function playlist()
    {
        return $this->belongsTo('App\Playlist');
    }
}