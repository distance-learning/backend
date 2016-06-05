<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeIndexesToSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table
                ->index([
                    'name'
                ])
            ;
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table
                ->index([
                    'name'
                ])
            ;
        });

        Schema::table('tests', function (Blueprint $table) {
            $table
                ->index([
                    'name'
                ])
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
