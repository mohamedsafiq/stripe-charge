<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$products = ['Dell Laptop','Redmi Note 10', 'Sony Xperia TV', 'Reading Table', 'Medal Bed Frames','Oneplus Nord 2', 'Oppo Reno 2', 'Boat Headphones 310tc', 'Apple iPhone 9pro', 'Raybond Sunglass', 'Yardley Scent'];
        $faker = Faker::create();
        foreach(range(1,10) as $value)
        {
        	Products::create([
        		'field_name' =>$products[$value],
        		'price' => $faker->numberBetween($min = 100, $max = 10000),
        		'description' =>$faker->text(200)
        	]);
        }
    }
}
