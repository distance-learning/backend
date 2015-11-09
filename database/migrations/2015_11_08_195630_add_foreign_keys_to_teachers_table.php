<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
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
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign('teachers_teacher_id_foreign');
            $table->dropForeign('teachers_subject_id_foreign');
            $table->dropForeign('teachers_department_id_foreign');

            $table->dropColumn(['teacher_id', 'subject_id', 'department_id']);
        });
    }
}