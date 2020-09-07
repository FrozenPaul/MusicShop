<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => 'классическая музыка',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('genres')->insert([
            'name' => 'прелюдия',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('genres')->insert([
            'name' => 'джаз',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('genres')->insert([
            'name' => 'блюз',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('genres')->insert([
            'name' => 'кантри',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
