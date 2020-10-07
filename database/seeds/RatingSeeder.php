<?php

use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i < 101; $i++){
            for ($j = 1; $j < 20; $j++){
                DB::table('ratings')->insert([
                    'rating' => $faker->numberBetween(1,5),
                    'user_id' => $j,
                    'music_track_id' => $i,
                    'created_at' => \Carbon\Carbon::now(),
                ]);
            }
        }

//        DB::table('ratings')->insert([
//            'rating' => $faker->numberBetween(1,5),
//            'user_id' => $faker->numberBetween($min = 1, $max = 20),
//            'music_track_id' => $faker->numberBetween($min = 1, $max = 100),
//            'created_at' => \Carbon\Carbon::now(),
//        ]);
    }
}
