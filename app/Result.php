<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
    
    public function game()
    {
        return $this->belongsTo('App\Game', 'gameId');
    }
    
    public function noun()
    {
        return $this->belongsTo('App\Noun', 'sloleksKeyN', 'sloleksKeyResult');
    }
    
    public function adjective()
    {
        return $this->belongsTo('App\Adjective', 'sloleksKeyAd', 'sloleksKeyResult');
    }
}
