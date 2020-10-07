<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin'=> 1,
            'password' => Hash::make('1234'),
            'created_at'=> Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Peter',
            'email' => Str::random(10).'@gmail.com',
            'is_admin'=> 0,
            'password' => Hash::make('4321'),
            'created_at'=> Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Alla',
            'email' => Str::random(10).'@gmail.com',
            'is_admin'=> 0,
            'password' => Hash::make('password'),
            'created_at'=> Carbon::now(),
        ]);

        for ($i = 0; $i < 20; $i++){
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'is_admin'=> 0,
                'password' => Hash::make('password'),
                'created_at'=> Carbon::now(),
            ]);
        }
    }
}
