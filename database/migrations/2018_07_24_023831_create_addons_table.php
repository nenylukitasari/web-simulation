<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('witel');
            $table->integer('input_minipack')->nullable();
            $table->integer('realisasi_minipack')->nullable();
            $table->integer('target_minipack')->nullable();
            
            $table->integer('input_stb')->nullable();
            $table->integer('realisasi_stb')->nullable();
            $table->integer('target_stb')->nullable();
            
            $table->integer('input_telepon')->nullable();
            $table->integer('realisasi_telepon')->nullable();
            $table->integer('target_telepon')->nullable();
            
            $table->integer('input_upspeed')->nullable();
            $table->integer('realisasi_upspeed')->nullable();
            $table->integer('target_upspeed')->nullable();
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
        Schema::dropIfExists('addons');
    }
}
