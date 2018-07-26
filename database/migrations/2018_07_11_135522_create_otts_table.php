<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('witel');
            $table->integer('catchplay')->nullable();
            $table->integer('iflix')->nullable();
            $table->integer('hooq')->nullable();
            $table->integer('movin')->nullable();
            $table->integer('jml_ott')->nullable();
            $table->integer('salesDIY')->nullable();
            $table->float('treshold')->nullable();
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
        Schema::dropIfExists('otts');
    }
}
