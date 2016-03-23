<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table
                ->integer('teacher_id')
                ->unsigned()
                ->nullable()
            ;
            $table
                ->integer('subject_id')
                ->unsigned()
                ->nullable()
            ;
            $table
                ->integer('direction_id')
                ->unsigned()
                ->nullable()
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
        Schema::dropIfExists('teachers');
    }
}
