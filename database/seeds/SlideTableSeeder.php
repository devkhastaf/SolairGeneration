<?php

use Illuminate\Database\Seeder;
use App\Slide;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::create([
            'product_id' => 1,
            'image' => 'slides\July2018\1.jpg',
            'visible' => true
        ]);

        Slide::create([
            'product_id' => 2,
            'image' => 'slides\July2018\2.jpg',
            'visible' => true
        ]);

        Slide::create([
            'product_id' => 3,
            'image' => 'slides\July2018\3.jpg',
            'visible' => true
        ]);

        Slide::create([
            'product_id' => 4,
            'image' => 'slides\July2018\4.jpg',
            'visible' => false
        ]);

        Slide::create([
            'product_id' => 5,
            'image' => 'slides\July2018\5.jpg',
            'visible' => true
        ]);
    }
}
