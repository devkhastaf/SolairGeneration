<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    public function featured(){
        return $this->hasOne('App\Featured');
    }
}
