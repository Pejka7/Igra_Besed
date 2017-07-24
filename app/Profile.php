<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['name', 'age'];
    
    public function user()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}
