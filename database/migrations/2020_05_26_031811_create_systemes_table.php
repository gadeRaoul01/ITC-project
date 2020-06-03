<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemes', function (Blueprint $table) {
            $table->id();
            $table->String('group');
            $table->String('description')->nullable();
            $table->String('param1')->nullable();
            $table->String('param2')->nullable();
            $table->String('param3')->nullable();
            $table->String('param4')->nullable();
            $table->boolean('flag_etat')->default(false);
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
        Schema::dropIfExists('systemes');
    }
}
