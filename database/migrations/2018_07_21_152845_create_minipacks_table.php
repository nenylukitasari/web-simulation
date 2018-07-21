<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinipacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minipacks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('witel');
            $table->string('bobot');
            $table->integer('input_minipacks');
            $table->integer('realisasi_minipacks');
            $table->integer('target_minipacks');
            $table->integer('achievement');
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
        Schema::dropIfExists('minipacks');
    }
}
