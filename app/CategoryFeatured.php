<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFeatured extends Model
{
    protected $table = 'category_featured';

    protected $fillable = ['category_id', 'featured_id'];
}
