<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_BL');
            $table->string('ref_BL');
            $table->bigInteger('id_client')->unsigned();
            $table->float('total_HT');
            $table->float('total_TVA');
            $table->float('total_TTC');
            $table->timestamps();
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bls');
    }
}
