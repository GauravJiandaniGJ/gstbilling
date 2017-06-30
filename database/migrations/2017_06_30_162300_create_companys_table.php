<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration
{

    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('short_name');

            $table->text('address');

            $table->string('gstin');

            $table->string('state');

            $table->string('username');

            $table->string('password');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('companys');
    }
}
