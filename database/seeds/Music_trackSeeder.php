<?php

use Illuminate\Database\Seeder;

class Music_trackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('music_tracks')->insert([
            'name' => 'Prelude in G minor',
            'author_id' => 1,
            'genre_id' => 2,
            'instrument_id'=> 1,
            'year' => 1901,
            'complexity' => 'экспертная',
            'rating' => 4.9,
            'description' => 'Прелюдия соль минор , соч. 23, № 5, - это музыкальное произведение Сергея Рахманинова , завершенное в 1901 году. [1] Оно было включено в егонабор из десяти прелюдий Opus 23 , несмотря на то, что был написан на два года раньше, чем остальные девять. Сам Рахманинов впервые представил это произведение в Москве 10 февраля 1903 года вместе с прелюдиями № 1 и 2 из соч. 23.',
            'link' => 'https://www.youtube.com/embed/SlcQWUn5DeI',
            'notes_path' => '/pdfs/Prelude_in_G_Minor_Op._23_No._5',
            'picture_path' => '/images/prelude in G minor rachmaninoff.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('music_tracks')->insert([
            'name' => '',
            'author_id' => '',
            'genre_id' => '',
            'instrument_id'=>'',
            'year' => '',
            'complexity' => '',
            'rating' => '',
            'description' => '',
            'link' => '',
            'notes_path' => '',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('music_tracks')->insert([
            'name' => '',
            'author_id' => '',
            'genre_id' => '',
            'instrument_id'=>'',
            'year' => '',
            'complexity' => '',
            'rating' => '',
            'description' => '',
            'link' => '',
            'notes_path' => '',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('music_tracks')->insert([
            'name' => '',
            'author_id' => '',
            'genre_id' => '',
            'instrument_id'=>'',
            'year' => '',
            'complexity' => '',
            'rating' => '',
            'description' => '',
            'link' => '',
            'notes_path' => '',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
