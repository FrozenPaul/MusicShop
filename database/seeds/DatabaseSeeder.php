<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(AuthorSeeder::class);
         $this->call(GenreSeeder::class);
         $this->call(InstrumentSeeder::class);
         $this->call(Music_trackSeeder::class);
         $this->call(MessageSeeder::class);
         $this->call(RatingSeeder::class);
    }
}
