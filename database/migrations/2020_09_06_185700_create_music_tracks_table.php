<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('music_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('instrument_id');
            $table->integer('year');
            $table->string('complexity');
            $table->double('rating')->nullable()->default(0);
            $table->text('description');
            $table->string('link');
            $table->string('notes_path');
            $table->string('picture_path');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('instrument_id')->references('id')->on('instruments')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('music_tracks');
    }
}
