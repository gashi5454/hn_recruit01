<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
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
            $table->dropColumn('birthday', 'genre', 'composition', 'achievement');
        });
    }
}
