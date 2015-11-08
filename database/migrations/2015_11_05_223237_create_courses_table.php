<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('teacher_id');
            $table->integer('group_id');

            $table
                ->string('slug')
                ->unique()
            ;

            $table
                ->foreign('subject_id')
                ->references('id')
                ->on('subjects')
            ;

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
            ;

            $table
                ->foreign('group_id')
                ->references('id')
                ->on('groups')
            ;

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
