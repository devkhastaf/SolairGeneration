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
        Category::create([
            'name' => 'Laptop1',
            'slug' => 'laptop',
            'created_at' => $now,
            'updated_at' => $now
        ]);

        Category::create([
            'name' => 'Tab',
            'slug' => 'tab',
            'parent' => 1,
            'created_at' => $now,
            'updated_at' => $now
        ])->featureds()->attach(1);


        Category::create([
            'name' => 'Desktop',
            'slug' => 'desktop',
            'created_at' => $now,
            'updated_at' => $now
        ])->featureds()->attach(4);


        Category::create([
            'name' => 'Phone',
            'slug' => 'phone',
            'created_at' => $now,
            'updated_at' => $now
        ])->featureds()->attach(2);


        Category::create([
            'name' => 'Clothes',
            'slug' => 'clothes',
            'created_at' => $now,
            'updated_at' => $now
        ])->featureds()->attach(3);


        Category::create([
            'name' => 'Apps',
            'slug' => 'apps',
            'created_at' => $now,
            'updated_at' => $now
        ])->featureds()->attach(1);
    }
}
