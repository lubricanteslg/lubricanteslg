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
            'email' => 'oficina@diluga.com.ve',
            'name' => 'Oficina',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.simon@diluga.com.ve',
            'name' => 'Simón Ramírez',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.carlo@diluga.com.ve',
            'name' => 'Carlo Rios',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.victor@diluga.com.ve',
            'name' => 'victor',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'gerencia.rina@diluga.com.ve',
            'name' => 'Rina Gonzalez',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'ventas.joseg@diluga.com.ve',
            'name' => 'Jose Gregorio',
            'password' => bcrypt('123456789')
        ]);

        DB::table('users')->insert([
            'email' => 'facturacion.arnardo@diluga.com.ve',
            'name' => 'Arnardo',
            'password' => bcrypt('123456789')
        ]);

        

        
        DB::table('salesmen')->insert([
            'user_id' => 1,
            'code' => '00000',
            'name' => 'Ramón Ledezma',
            'phone' => '04160350957',
            'email' => 'sistemas@inversionespc.com.ve',
            'zone_code' => '00020',
            'last_order' => '2016-03-30',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 2,
            'code' => '00001',
            'name' => 'Oficina',
            'phone' => '0235-3422025',
            'email' => 'oficina@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2016-03-30',
        ]);

        
        DB::table('salesmen')->insert([
            'user_id' => 3,
            'code' => '00002',
            'name' => 'Simón Ramírez',
            'phone' => '0416-3366934',
            'email' => 'ventas.simon@diluga.com.ve',
            'zone_code' => '00002',
            'last_order' => '2016-03-30',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 4,
            'code' => '00003',
            'name' => 'Carlo Rios',
            'phone' => '0424-312-5687',
            'email' => 'ventas.carlo@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2015-03-12',
        ]);

        
        DB::table('salesmen')->insert([
            'user_id' => 5,
            'code' => '00004',
            'name' => 'Victor Cappa',
            'phone' => '0235-3422025',
            'email' => 'ventas.victor@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2016-03-30',
        ]);

        DB::table('salesmen')->insert([
            'user_id' => 6,
            'code' => '00005',
            'name' => 'Rina González',
            'phone' => '0235-3422025',
            'email' => 'gerencia.rina@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2015-03-12',
        ]);

        
        DB::table('salesmen')->insert([
            'user_id' => 7,
            'code' => '00006',
            'name' => 'Jose Gregorio',
            'phone' => '0424-3528707',
            'email' => 'ventas.joseg@diluga.com.ve',
            'zone_code' => '00014',
            'last_order' => '2016-03-30',
        ]);
        
        

        DB::table('salesmen')->insert([
            'user_id' => 8,
            'code' => '00007',
            'name' => 'Arnardo Martínez',
            'phone' => '0424-312-5687',
            'email' => 'facturacion.arnardo@diluga.com.ve',
            'zone_code' => '00020',
            'last_order' => '2016-03-30',
        ]);

        

        
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
    }
}
