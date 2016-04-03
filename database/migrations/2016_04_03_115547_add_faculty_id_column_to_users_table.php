<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacultyIdColumnToUsersTable extends Migration
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
                ->integer('faculty_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
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
        Schema::table('tests', function (Blueprint $table) {
            $table
                ->dropForeign('tests_faculty_id_foreign')
            ;

            $table
                ->dropColumn([
                    'faculty_id'
                ])
            ;
        });
    }
}
