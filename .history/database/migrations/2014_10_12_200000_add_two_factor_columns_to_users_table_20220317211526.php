<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('two_factor_secret')
                ->after('password')
                ->nullable();

            $table->text('two_factor_recovery_codes')
                ->after('two_factor_secret')
                ->nullable();

            $table->string('kana', 50)->nullable()
                ->after('profile_photo_path')
                ->nullable();

            $table->string('tel', 30)->nullable();
            $table->text('other_contact')->nullable();
            $table->string('address', 80)->nullable();
            $table->string('postal_code', 50)->nullable();
            $table->string('birthday')
                ->after('remember_token')
                ->nullable();
            $table->string('genre')
                ->after('birthday')
                ->nullable();
            $table->string('composition')
                ->after('genre')
                ->nullable();
            $table->string('achievement')
                ->after('composition')
                ->nullable();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('two_factor_secret', 'two_factor_recovery_codes');
        });
    }
};
