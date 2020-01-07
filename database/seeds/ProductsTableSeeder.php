<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            App\Product::create([
                'name' => $faker->name,
                'price' => $faker->randomDigit(10000),
                'in_stock' => $faker->randomElement(['0','1']),

            ]);
        } 
    }
}
