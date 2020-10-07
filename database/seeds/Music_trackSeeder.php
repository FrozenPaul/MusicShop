<?php

require_once 'vendor/autoload.php';

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
        $faker = Faker\Factory::create();


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
            'notes_path' => 'pdfs/Prelude_in_G_Minor_Op._23_No._5.pdf',
            'picture_path' => '/images/prelude in G minor rachmaninoff.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        $list = [
            'https://www.youtube.com/embed/lptoUuXEF5U',
            'https://www.youtube.com/embed/RtIAiDOBWJ8',
            'https://www.youtube.com/embed/oj5NBsgoVbI',
            'https://www.youtube.com/embed/2yo5FHH2KnM',
            'https://www.youtube.com/embed/ny6BEr8CoJ4',
            'https://www.youtube.com/embed/4JJFJsmliUU',
            'https://www.youtube.com/embed/6_6lgVGwaWo',
            'https://www.youtube.com/embed/XCxhewTxNOs',
        ];

        for ($i = 0; $i < 100; $i++)
        {
            DB::table('music_tracks')->insert([
                'name' => $faker->name,
                'author_id' => $faker->numberBetween($min = 1, $max = 24),
                'genre_id' => $faker->numberBetween($min = 1, $max = 5),
                'instrument_id' => $faker->numberBetween($min = 1, $max = 4),
                'year' => $faker->year,
                'complexity' => $faker->word,
                'rating' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = 5),
                'description' => $faker->text,
                'link' => $list[$faker->numberBetween(0,7)],
                'notes_path' => 'storage/notes/'.$faker->numberBetween(1,12).'.pdf',
                'picture_path' => $faker->imageUrl(250, 300),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }

    }
}
