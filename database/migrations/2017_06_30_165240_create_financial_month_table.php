<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialMonthTable extends Migration
{

    public function up()
    {
        Schema::create('financial_months', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');

            $table->integer('financial_year_id')->unsigned();
            $table->foreign('financial_year_id')->references('id')->on('financial_years');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('financial_months');
    }
}
