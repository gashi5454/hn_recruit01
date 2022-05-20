<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')
                ->nullable();
            $table->text('two_factor_recovery_codes')
                ->nullable();
            $table->rememberToken()->nullable();
            $table->foreignId('current_team_id')->nullable();
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
            $table->datetime('updated_at')->nullable();
            $table->datetime('quit_at')->nullable();
            $table->datetime('return_at')->nullable();
            $table->integer('login_status')->nullable();
            $table->integer('account_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventers');
    }
}
