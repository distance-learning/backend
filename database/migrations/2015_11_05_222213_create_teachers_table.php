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
            $table->integer('teacher_id');
            $table->integer('subject_id');
            $table->integer('department_id');

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('users')
            ;

            $table
                ->foreign('subject_id')
                ->references('id')
                ->on('subjects')
            ;

            $table
                ->foreign('department_id')
                ->references('id')
                ->on('departments')
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
