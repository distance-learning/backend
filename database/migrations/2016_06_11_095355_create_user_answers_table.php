<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->nullable();
            $table->integer('score_id')->unsigned()->nullable();
            $table->boolean('is_correct');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('SET NULL');
            $table->foreign('score_id')->references('id')->on('scores')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_answers');
    }
}
