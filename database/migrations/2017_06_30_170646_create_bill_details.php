<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetails extends Migration
{

    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('bill_no')->unsigned();
            $table->foreign('bill_no')->references('bill_no')->on('bills_primary');

            $table->string('name_of_product');

            $table->integer('service_code');

            $table->integer('qty');

            $table->integer('total_amount');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_details');
    }
}
