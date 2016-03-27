<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table
                ->increments('id')
            ;

            $table
                ->string('name')
            ;

            $table
                ->string('image')
                ->nullable()
            ;

            $table
                ->string('type')
                ->default('single')
            ;

            $table
                ->integer('test_id')
                ->unsigned()
            ;

            $table
                ->foreign('test_id')
                ->references('id')
                ->on('tests')
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
        Schema::dropIfExists('questions');
    }
}
