<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function products(){
        return $this->belongsToMany('App\Product');
    }

    public function featureds(){
        return $this->belongsToMany('App\Featured');
    }

    public function subCategories(){
        return Category::where('parent', $this->id)->get();
    }
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
}
