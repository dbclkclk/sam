<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("msisdn");
            $table->integer("operatorid");
            $table->integer("shortcodeid");
            $table->string("text");
            $table->string("auth_token");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mo');
    }
}
