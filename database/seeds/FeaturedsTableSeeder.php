<?php

use Illuminate\Database\Seeder;
use App\Featured;

class FeaturedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Featured::create([
            'name' => 'RAM',
            'slug' => 'ram'
        ]);
        Featured::create([
            'name' => 'ROM',
            'slug' => 'rom'
        ]);
        Featured::create([
            'name' => 'CPU',
            'slug' => 'cpu'
        ]);
        Featured::create([
            'name' => 'Display',
            'slug' => 'display'
        ]);
    }
}
