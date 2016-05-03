<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->increments('id');

            $table->float('score');

            $table
                ->integer('student_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('student_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table
                ->integer('test_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('test_id')
                ->references('id')
                ->on('tests')
                ->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scores');
    }
}
