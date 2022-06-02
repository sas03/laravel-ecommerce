<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Oppo mobile',
                'price' => '300',
                'description' => 'A smartphone with 8gb ram and much more features',
                'category' => 'mobile',
                "gallery" => 'https://www.tera.ma/wp-content/uploads/2022/03/oppo-bleu.jpg'
            ],
            [
                'name' => 'Panasonic TV',
                'price' => '400',
                'description' => 'A smartTV with much more features',
                'category' => 'TV',
                "gallery" => 'https://www.panasonic.com/content/dam/pim/fr/fr/TX/TX-40A/TX-40AX630E/TX-40AX630E-Variation_Image_for_See_All_1Global-1_fr_fr.png'
            ],
            [
                'name' => 'Sony TV',
                'price' => '500',
                'description' => 'A Tv with much more features',
                'category' => 'TV',
                "gallery" => 'https://m.media-amazon.com/images/I/71uHiehnokL._AC_SL1500_.jpg'
            ],
            [
                'name' => 'LG fridge',
                'price' => '200',
                'description' => 'A fridge with much more features',
                'category' => 'fridge',
                "gallery" => 'http://www.cheatsheet.com/wp-content/uploads/2017/06/Silver-fridge-with-side-by-side-door-system.jpg'
            ]
        ]);
    }
}
