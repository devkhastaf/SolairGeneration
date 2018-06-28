<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'MacBook Pro',
            'slug' => 'macbook-pro',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Laptop 1',
            'slug' => 'laptop1',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(1);

        Product::create([
            'name' => 'Laptop 2',
            'slug' => 'laptop2',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(2);

        Product::create([
            'name' => 'Laptop 3',
            'slug' => 'laptop3',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Laptop 4',
            'slug' => 'laptop4',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Laptop 5',
            'slug' => 'laptop5',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(3);

        Product::create([
            'name' => 'Laptop 6',
            'slug' => 'laptop6',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(5);
        Product::create([
            'name' => 'Laptop 7',
            'slug' => 'laptop7',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(4);

        Product::create([
            'name' => 'Desktop',
            'slug' => 'desktop',
            'details' => '15 inch, 1TB SSD, 32GB RAM',
            'price' => 2999,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.'
        ])->categories()->attach(2);
    }
}