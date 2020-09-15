<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'text' => 'Мне понравилось',
            'user_id' => 1,
            'music_track_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('messages')->insert([
            'text' => 'Красотища',
            'user_id' => 2,
            'music_track_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('messages')->insert([
            'text' => 'Очень круто, спасибо',
            'user_id' => 3,
            'music_track_id' => 1,
            'created_at' => \Carbon\Carbon::now(),
        ]);


    }
}
