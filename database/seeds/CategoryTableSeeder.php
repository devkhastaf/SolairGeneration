<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        Category::insert([
            ['name' => 'Laptop1', 'slug' => 'laptop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Desktop', 'slug' => 'desktop', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Phone', 'slug' => 'phone', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Clothes', 'slug' => 'clothes', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apps', 'slug' => 'apps', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
