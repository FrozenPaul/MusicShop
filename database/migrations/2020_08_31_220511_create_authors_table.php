<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->integer('age');
            $table->string('sity_of_birth');
            $table->string('date_of_birth');
            $table->string('date_of_death');
            $table->string('place_of_death');
            $table->string('buried');
            $table->string('jobs');
            $table->string('genres');
            $table->string('instruments');
            $table->string('rewards');
            $table->string('picture_path');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
