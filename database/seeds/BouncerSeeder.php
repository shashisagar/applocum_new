<?php

use App\Customer;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Bouncer::allow('administrator')->everything();
        // \Bouncer::allow('user-manager')->toOwn(User::class);
        // \Bouncer::allow('shop-manager')->toOwn(Product::class);
        // \Bouncer::allow('shop-manager')->toOwn(Order::class);

        Bouncer::allow('user-manager')->to('customer-view', Customer::class);
        Bouncer::allow('shop-manager')->to('order-view', Order::class);
        Bouncer::allow('shop-manager')->to('product-view',Product::class);

    }
}
