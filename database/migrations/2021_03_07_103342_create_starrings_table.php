<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starrings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->string('gallery');
            $table->string('date_of_birth');
            $table->string('place_of_birth');
            $table->text('family');
            $table->string('education');
            $table->string('debut');
            $table->text('biography');
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
        Schema::dropIfExists('starrings');
    }
}
