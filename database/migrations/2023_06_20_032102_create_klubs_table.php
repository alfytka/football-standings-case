<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKlubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klubs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klub', '200');
            $table->string('kota', '100');
            $table->string('main')->default(0);
            $table->string('menang')->default(0);
            $table->string('seri')->default(0);
            $table->string('kalah')->default(0);
            $table->string('goal_menang')->default(0);
            $table->string('goal_kalah')->default(0);
            $table->string('point')->default(0);
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('klubs');
    }
}
