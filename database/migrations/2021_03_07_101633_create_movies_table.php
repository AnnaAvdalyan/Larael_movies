<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->string('video');
            $table->string('trailer');
            $table->string('age_rating');
            $table->string('year');
            $table->string('country');
            $table->string('tagline');
            $table->string('producer');
            $table->string('genre_id');
            $table->string('time');
            $table->string('starring_id');
            $table->text('text');
            $table->enum('status',['active','inactive','pending','suspend','deleted']);
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
