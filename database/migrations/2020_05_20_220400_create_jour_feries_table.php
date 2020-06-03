<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourFeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jour_feries', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('motif');
            $table->bigInteger('annee_id')->unsigned();
            $table->foreign('annee_id')
                ->references('id')
                ->on('annees');
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
        Schema::dropIfExists('jour_feries');
    }
}
