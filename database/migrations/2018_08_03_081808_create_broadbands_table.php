<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadbandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadbands', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->string('witel');
            $table->integer('duapuluh')->nullable();
            $table->integer('tigapuluh')->nullable();
            $table->integer('empatpuluh')->nullable();
            $table->integer('limapuluh')->nullable();
            $table->integer('seratus')->nullable();
            $table->integer('totalps')->nullable();
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
        Schema::dropIfExists('broadbands');
    }
}
