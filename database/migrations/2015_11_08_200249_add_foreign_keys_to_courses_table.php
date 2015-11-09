<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToCoursesTable extends Migration
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
            $table->dropForeign('courses_teacher_id_foreign');
            $table->dropForeign('courses_subject_id_foreign');
            $table->dropForeign('courses_group_id_foreign');

            $table->dropColumn(['teacher_id', 'subject_id', 'group_id']);
        });
    }
}
