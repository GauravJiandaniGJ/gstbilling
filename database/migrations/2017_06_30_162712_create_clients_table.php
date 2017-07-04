<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
