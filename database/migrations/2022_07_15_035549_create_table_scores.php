<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableScores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id("scid");
            $table->unsignedTinyInteger("mark");
            $table->string("result",50);
            $table->string("sid",20);
            $table->string("sbid",20);
            $table->timestamps();
            $table->foreign("sid")->references("sid")->on("students");
            $table->foreign("sbid")->references("sbid")->on("subjects");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
