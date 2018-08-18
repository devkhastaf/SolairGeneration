<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
        /*  'joins' => [
         *       'posts' => ['users.id','posts.user_id'],
         *   ],
         */
    ];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function orders()
    {
        return $this->hasMany('App\Order','product_id', 'order_id', 'order_product');
    }

    public function featureds(){
        return $this->belongsToMany('App\Featured');
    }

    protected $fillable = ['name', 'slug', 'details', 'price', 'description'];

    /*public function presentPrice(){
        $fmt = new \NumberFormatter('de_DE', \NumberFormatter::CURRENCY);
        return $fmt->formatCurrency($this->price / 100, "EUR");
    }
    */
    public function scopeMightAlsoLike($query){
        return $query->inRandomOrder()->take(4);
    }

}
