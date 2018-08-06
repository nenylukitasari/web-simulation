<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePullputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pullputs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('witel');
            $table->integer('salespush')->nullable();
            $table->integer('salespull')->nullable();
            $table->integer('salesput')->nullable();
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
        Schema::dropIfExists('pullputs');
    }
}
