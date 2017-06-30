<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsAddressTable extends Migration
{

    public function up()
    {
        Schema::create('clients_address', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->text('address');

            $table->string('gstin');

            $table->string('state');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients_address');
    }
}
