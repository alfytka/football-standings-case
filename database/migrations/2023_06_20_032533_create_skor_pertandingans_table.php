<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkorPertandingansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skor_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_klub1');
            $table->foreignId('id_klub2');
            $table->string('skor_1');
            $table->string('skor_2');
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
        Schema::dropIfExists('skor_pertandingans');
    }
}
