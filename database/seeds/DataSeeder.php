<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        factory(App\User::class, 4)->create();
        //factory(App\Client::class, 9)->create();
        factory(App\Order::class, 10)->create();
        factory(App\OrderDetail::class, 60)->create();
        //factory(App\Product::class, 200)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
    }
}
