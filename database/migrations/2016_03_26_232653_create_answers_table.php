<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table
                ->increments('id')
            ;

            $table
                ->string('body')
            ;

            $table
                ->boolean('correct')
            ;

            $table
                ->integer('question_id')
                ->unsigned()
            ;

            $table
                ->foreign('question_id')
                ->references('id')
                ->on('questions')
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
        Schema::dropIfExists('answers');
    }
}
