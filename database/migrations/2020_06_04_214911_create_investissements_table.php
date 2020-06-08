<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investissements', function (Blueprint $table) {
            $table->id();
            $table->string('identifiant');
            $table->Double('Montant');
            $table->integer('taux');
            $table->integer('nb_jr');
            $table->integer('nb_jr_fait')->default(0);
            $table->integer('nb_recup');
            $table->bigInteger('annee_id')->unsigned();
            $table->bigInteger('portefeuille_id')->unsigned();
            $table->foreign('annee_id')
                ->references('id')
                ->on('annees');
            $table->foreign('portefeuille_id')
                ->references('id')
                ->on('portefeuilles');

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
        Schema::dropIfExists('investissements');
    }
}
