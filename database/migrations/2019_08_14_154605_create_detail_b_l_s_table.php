<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBLSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_b_l_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_BL')->unsigned();
            $table->string('produit');
            $table->float('quantite');
            $table->float('prix');
            $table->float('montant_HT');
            $table->float('tva');
            $table->float('montant_TVA');
            $table->float('montant_TTC');
            $table->timestamps();
            $table->foreign('id_BL')->references('id')->on('bls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_b_l_s');
    }
}
