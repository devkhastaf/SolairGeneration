<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    protected $fillable = ['name', 'slug', 'details', 'price', 'description'];

    public function presentPrice(){
        $fmt = new \NumberFormatter('de_DE', \NumberFormatter::CURRENCY);
        return $fmt->formatCurrency($this->price / 100, "EUR");
    }

    public function scopeMightAlsoLike($query){
        return $query->inRandomOrder()->take(4);
    }

}
