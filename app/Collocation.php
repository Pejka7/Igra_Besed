<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collocation extends Model
{
    public function noun()
    {
        return $this->belongsTo('App\Noun', 'sloleksKeyN', 'sloleksKey');
    }
    
    public function adjective()
    {
        return $this->belongsTo('App\Adjective', 'sloleksKeyAd', 'sloleksKey');
    }
}
