<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collocations', function (Blueprint $table) {
            $table->string('sloleksKey')->primary();
            $table->string('recordAdjective');
            $table->string('recordNoun');
            $table->integer('freqQuotient');
            $table->float('strengthQuotient', 4, 2);
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
