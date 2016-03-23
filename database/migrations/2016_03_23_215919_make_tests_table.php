<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table
                ->increments('id')
            ;

            $table
                ->string('name')
            ;

            $table
                ->integer('time')
            ;

            $table
                ->integer('teacher_id')
                ->unsigned()
            ;

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
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
        Schema::dropIfExists('tests');
    }
}
