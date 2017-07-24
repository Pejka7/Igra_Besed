<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noun extends Model
{
    public function result()
    {
        return $this->hasMany('App\Result', 'sloleksKeyN', 'sloleksKeyResult');
    }
    
    public function collocation()
    {
        return $this->hasMany('App\Collocation', 'sloleksKeyN', 'sloleksKey');
    }
}
