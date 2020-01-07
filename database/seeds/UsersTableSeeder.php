<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $administrator = factory(App\User::class)->create([
        'email' => 'applocumadmin@yopmail.com',
        'password' => bcrypt('Password@123')
    ]);

    $administrator->assign('administrator');

    $usermanager = factory(App\User::class)->create([
          'email' => 'usermanager@gmail.com',
          'password' => bcrypt('Password@123')
    ]);

    $usermanager->assign('user-manager');


    $shopmanager=factory(App\User::class)->create([
        'email' => 'shopmanager@gmail.com',
        'password' => bcrypt('Password@123')
    ]);

    $shopmanager->assign('shop-manager');

    }
}
