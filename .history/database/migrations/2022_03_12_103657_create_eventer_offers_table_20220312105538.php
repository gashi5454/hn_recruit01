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
            $table->string('title', 100)->nullable();
            $table->string('genre', 255)->nullable();
            $table->text('appear_date')->nullable();
            $table->string('number_of_bands', 30)->nullable();
            $table->string('quota', 30)->nullable();
            $table->string('requirement', 30)->nullable();
            $table->text('contact')->nullable();
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
