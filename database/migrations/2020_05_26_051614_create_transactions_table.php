<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('identifiant');
            $table->string('montant');
            $table->bigInteger('portefeuille_id')->unsigned();
            $table->bigInteger('typeTransaction_id')->unsigned();
            $table->bigInteger('numCompte_id')->unsigned();

            $table->foreign('portefeuille_id')
                ->references('id')
                ->on('portefeuilles');

            $table->foreign('typeTransaction_id')
                ->references('id')
                ->on('type_transactions');

            $table->foreign('numCompte_id')
                ->references('id')
                ->on('num_comptes');

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
        Schema::dropIfExists('transactions');
    }
}
