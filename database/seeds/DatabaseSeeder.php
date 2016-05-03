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
        //factory(App\User::class, 5)->create();
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
            'name' => 'Ramón Ledezma',
            'password' => bcrypt('neronado123')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.simon@diluga.com.ve',
            'name' => 'Simón Ramírez',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.joseg@diluga.com.ve',
            'name' => 'Jose Gregorio',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'facturacion.arnardo@diluga.com.ve',
            'name' => 'Oficina',
            'password' => bcrypt('123456789')
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 3,
            'code' => '00001',
            'name' => 'Oficina',
            'phone' => '0235-3422025',
            'email' => 'facturacion.arnardo@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2016-03-30',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 2,
            'code' => '00002',
            'name' => 'Simón Ramírez',
            'phone' => '0416-3366934',
            'email' => 'ventas.simon@diluga.com.ve',
            'zone_code' => '00002',
            'last_order' => '2016-03-30',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 3,
            'code' => '00005',
            'name' => 'Jose Gregorio',
            'phone' => '0424-3528707',
            'email' => 'ventas.joseg@diluga.com.ve',
            'zone_code' => '00014',
            'last_order' => '2016-03-30',
        ]);
        /*
        DB::table('salesmen')->insert([
            'user_id' => 4,
            'code' => '00004',
            'name' => 'Carlo Rios',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone_code' => 'Epsilon',
            'last_order' => '2015-03-12',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 5,
            'code' => '00005',
            'name' => 'Oficina',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone_code' => 'Epsilon',
            'last_order' => '2015-03-12',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 6,
            'code' => '00006',
            'name' => 'Rina',
            'phone' => '0424-312-5687',
            'email' => str_random(10).'@gmail.com',
            'zone_code' => 'Epsilon',
            'last_order' => '2015-03-12',
        ]);

        */
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
    }
}
