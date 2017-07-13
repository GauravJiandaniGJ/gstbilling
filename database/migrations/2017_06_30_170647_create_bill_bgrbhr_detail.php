<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillBgrbhrDetail extends Migration
{

    public function up()
    {
        Schema::create('bill_bgrbhr_detail', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('bill_no')->unsigned();
            $table->foreign('bill_no')->references('bill_no')->on('bills_primary');

            $table->string('name_of_product')->nullable();

            $table->integer('service_code')->nullable();

            $table->integer('qty')->nullable();

            $table->integer('rate')->nullable();

            $table->integer('total_amount')->nullable();

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('bill_bgrbhr_detail');
    }
}
