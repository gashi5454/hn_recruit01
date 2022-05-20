<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_applies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('kana', 50)->nullable();
            $table->string('tel', 30)->nullable();
            $table->text('other_contact')->nullable();
            $table->string('address', 80)->nullable();
            $table->string('postal_code', 50)->nullable();
            $table->string('capacity', 30)->nullable();
            $table->string('quota', 30)->nullable();
            $table->string('requirement', 30)->nullable();
            $table->string('carport', 30)->nullable();
            $table->datetime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_applies');
    }
}
