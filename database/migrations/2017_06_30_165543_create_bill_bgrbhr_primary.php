<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillBgrbhrPrimary extends Migration
{

    public function up()
    {
        Schema::create('bill_bgrbhr_primary', function (Blueprint $table) {

            $table->increments('bill_no');

            $table->date('bill_date');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys');

            $table->integer('client_address_id')->unsigned();
            $table->foreign('client_address_id')->references('id')->on('clients_address');

            $table->integer('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('banks');

            $table->longText('description');

            $table->double('after_cgst');

            $table->double('after_sgst');

            $table->double('after_igst');

            $table->double('total_gst');

            $table->double('final_amount');

            $table->integer('financial_year_id')->unsigned();
            $table->foreign('financial_year_id')->references('id')->on('financial_years');

            $table->integer('financial_month_id')->unsigned();
            $table->foreign('financial_month_id')->references('id')->on('financial_months');

            $table->string('status');       // edit, final

            $table->timestamps();

        });
    }

    public function down()
    {

        Schema::dropIfExists('bill_bgrbhr_primary');

    }
}
