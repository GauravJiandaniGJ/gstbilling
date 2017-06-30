<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortcutsTable extends Migration
{

    public function up()
    {
        Schema::create('shortcuts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('description');

            $table->double('price');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shortcuts');
    }
}
