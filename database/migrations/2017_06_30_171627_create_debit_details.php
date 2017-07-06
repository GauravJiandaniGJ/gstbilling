<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitDetails extends Migration
{

    public function up()
    {
        Schema::create('debit_details', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('debit_no')->unsigned();
            $table->foreign('debit_no')->references('debit_no')->on('debit_primary');


            $table->string('name_of_product')->nullable();

            $table->integer('service_code')->nullable();

            $table->integer('qty')->nullable();

            $table->double('rate')->nullable();

            $table->double('total_amount')->nullable();

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('debit_details');
    }
}
