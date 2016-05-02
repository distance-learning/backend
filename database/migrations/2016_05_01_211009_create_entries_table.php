<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');

            $table
                ->integer('author_id')
                ->unsigned()
                ->nullable();

            $table->text('message');

            $table
                ->integer('course_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table
                ->foreign('course_id')
                ->references('id')
                ->on('courses')
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
        Schema::dropIfExists('entries');
    }
}
