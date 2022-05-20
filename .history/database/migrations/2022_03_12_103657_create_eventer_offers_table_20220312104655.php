<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventerOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventer_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('eventer_id')->comment('ライブハウスID');
            $table->foreign('eventer_id')->references('id')->on('eventers')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventer_offers');
    }
}
