<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialYearTable extends Migration
{

    public function up()
    {

        Schema::create('financial_years', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys');

            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('financial_years');
    }
}
