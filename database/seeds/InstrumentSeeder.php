<?php

use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments')->insert([
            'name' => 'фортепиано',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('instruments')->insert([
            'name' => 'скрипка',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('instruments')->insert([
            'name' => 'аккордеон',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('instruments')->insert([
            'name' => 'гитара',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
