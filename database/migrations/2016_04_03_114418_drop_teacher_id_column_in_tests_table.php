<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTeacherIdColumnInTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table
                ->dropForeign('tests_teacher_id_foreign')
            ;

            $table
                ->dropColumn([
                    'teacher_id'
                ])
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
        Schema::table('tests', function (Blueprint $table) {
            $table
                ->integer('teacher_id')
            ;

            $table
                ->foreign('teacher_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE')
            ;
        });
    }
}
