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

            $table->string('tel', 30)->nullable()
                ->after('kana')
                ->nullable();

            $table->text('other_contact')->nullable()
                ->after('tel')
                ->nullable();

            $table->string('birthday', 50)
                ->after('other_contact')
                ->nullable();

            $table->string('genre', 255)
                ->after('birthday')
                ->nullable();

            $table->text('composition')
                ->after('genre')
                ->nullable();

            $table->text('achievement')
                ->after('composition')
                ->nullable();

            $table->datetime('created_at')
                ->after('achievement')
                ->nullable();

            $table->datetime('updated_at')
                ->after('created_at')
                ->nullable();

            $table->datetime('quit_at')
                ->after('updated_at')
                ->nullable();

            $table->datetime('return_at')
                ->after('quit_at')
                ->nullable();

            $table->integer('login_status')
                ->after('return_at')
                ->nullable();

            $table->integer('account_status')
                ->after('login_status')
                ->nullable();
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
