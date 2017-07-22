<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNounsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nouns', function (Blueprint $table) {
            $table->string('sloleksKey')->primary();
            $table->string('record');
            $table->char('gender', 1);
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
