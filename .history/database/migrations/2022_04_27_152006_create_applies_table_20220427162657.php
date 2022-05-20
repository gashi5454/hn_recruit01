<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applies', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->unsignedBigInteger('eventer_id')->comment('ライブハウスID');
            $table->foreign('eventer_id')->references('id')->on('eventers')
                ->onUpdate('CASCADE')->onDelete('RESTRICT');

            $table->string('name', 50);

            $table->string('kana', 50)->nullable();

            $table->string('tel', 30)->nullable();

            $table->text('other_contact')->nullable();

            $table->string('birthday', 50)->nullable();

            $table->string('genre', 255)->nullable();

            $table->text('composition')->nullable();

            $table->text('achievement')->nullable();

            $table->text('audio_data')->nullable();

            $table->text('equipment')->nullable();

            $table->text('request')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applies');
    }
}
