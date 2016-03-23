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
            $table
                ->integer('subject_id')
                ->unsigned()
                ->nullable()
            ;
            $table
                ->integer('teacher_id')
                ->unsigned()
                ->nullable()
            ;
            $table
                ->integer('group_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->string('slug')
                ->unique()
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
