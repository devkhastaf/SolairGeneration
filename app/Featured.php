<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function values(){
        return $this->hasMany('App\Value');
    }
}
