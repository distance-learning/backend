<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_subject', function (Blueprint $table) {
            $table
                ->integer('user_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->integer('subject_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL')
            ;

            $table
                ->foreign('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('SET NULL')
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
        Schema::dropIfExists('teacher_subject');
    }
}
