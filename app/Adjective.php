<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjective extends Model
{
    public function result()
    {
        return $this->hasMany('App\Result', 'sloleksKeyAd', 'sloleksKeyResult');
    }
    
    public function collocation()
    {
        return $this->hasMany('App\Collocation', 'sloleksKeyAd', 'sloleksKey');
    }
}
