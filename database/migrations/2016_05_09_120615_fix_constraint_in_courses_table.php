<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixConstraintInCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table
                ->dropForeign('courses_teacher_id_foreign');

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table
                ->dropForeign('courses_teacher_id_foreign');

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
                ->onDelete('SET NULL');
        });
    }
}
