<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDirectionIdForeignKeyToFacultyIdSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_direction_id_foreign');
            $table->dropColumn('direction_id');

            $table
                ->integer('faculty_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('faculty_id')
                ->references('id')
                ->on('faculties')
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
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign('subjects_faculty_id_foreign');
            $table->dropColumn('faculty_id');

            $table
                ->integer('direction_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('direction_id')
                ->references('id')
                ->on('faculties')
                ->onDelete('SET NULL');
        });
    }
}
