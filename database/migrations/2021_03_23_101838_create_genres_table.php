<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the genre table
        // it's a termlist so call the string column name
        // don't need timestamps - not very useful here
        Schema::create("genres", function (Blueprint $table) {
            $table->id();
            $table->string("genre", 30);
        });
        // create the pivot table using the Eloquent naming convention
        Schema::create("game_genre", function (Blueprint $table) {
        // still have an id column
            $table->id();
            // create the article id column and foreign key
            $table->foreignId("game_id")
                ->constrained()
                ->onDelete("cascade");
            // create the genre id column and foreign key
            $table->foreignId("genre_id")
                ->constrained()
                ->onDelete("cascade");
        });
    }

    public function down()
    {
        // remove the pivot table first
        // otherwise all the tags foreign key contraints would fail
        Schema::dropIfExists("game_genre");
        // then drop the tags table
        Schema::dropIfExists("genres");
    }
}
