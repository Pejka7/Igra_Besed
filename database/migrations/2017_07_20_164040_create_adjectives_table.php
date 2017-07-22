<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjectives', function (Blueprint $table) {
            $table->string('sloleksKey')->primary();
            $table->string('recordM');
            $table->string('recordF');
            $table->string('recordN');
            $table->integer('freqLemma')->nullable();
            $table->integer('freqGramrel')->nullable();
            $table->float('strengthGramrel', 4, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
