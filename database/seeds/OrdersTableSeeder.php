<?php

use App\Customer;
use App\Product;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    for($i = 0; $i < 5; $i++) {

        $price_and_id=Product::select('price','id')->get()->toArray();
        $customer_id=Customer::select('id')->get()->toArray();

        $number=mt_rand(10000, 99999);
        $orders=App\Order::create([
            'invoice_number'=>$number,
            'total_amount' =>  $price_and_id[$i]['price'],
            'status' => $faker->randomElement(['new','processed']),
            'customer_id'=>$customer_id[$i]['id'],
        ]);

        $orders=App\OrderItem::create([
            'order_id' =>  $orders->id,
            'product_id' => $price_and_id[$i]['id'],
            'quantity'=>1
        ]);
    }
    }
}
