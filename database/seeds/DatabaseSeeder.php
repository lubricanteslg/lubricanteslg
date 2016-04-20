<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
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
        //factory(App\User::class, 4)->create();
        //factory(App\Client::class, 9)->create();
        //factory(App\Order::class, 10)->create();
        //factory(App\OrderDetail::class, 60)->create();
        //factory(App\Product::class, 200)->create();

        DB::table('oauth_clients')->insert([
            'id' => 'f3d259ddd3ed8ff3843839b',
            'secret' => '4c7f6f8fa93d59c45502c0ae8c4a95b',
            'name' => 'Diluga',
        ]);

        DB::table('users')->insert([
            'email' => 'ramonlv93@gmail.com',
            'name' => 'ramon',
            'password' => bcrypt('neronado123')
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 1,
            'name' => 'Simon Ramírez',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone' => 'Alpha',
            'last_order' => '2016-03-12',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 2,
            'name' => 'Oficina',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone' => 'Beta',
            'last_order' => '2016-01-31',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 3,
            'name' => 'Víctor Cappa',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone' => 'Omega',
            'last_order' => '2016-02-28',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 4,
            'name' => 'Carlo Rios',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone' => 'Epsilon',
            'last_order' => '2015-03-12',
        ]);

        DB::table('departments')->insert([
            'description' => 'Filtros'
        ]);

        DB::table('departments')->insert([
            'description' => 'Lubricantes'
        ]);

        DB::table('departments')->insert([
            'description' => 'Químicos'
        ]);

        DB::table('departments')->insert([
            'description' => 'Refrigerante'
        ]);

        DB::table('departments')->insert([
            'description' => 'Grasas'
        ]);

        DB::table('departments')->insert([
            'description' => 'Limpieza'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
    }
}
