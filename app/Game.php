<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function results()
    {
        return $this->hasMany('App\Result', 'gameId');
    }
}
