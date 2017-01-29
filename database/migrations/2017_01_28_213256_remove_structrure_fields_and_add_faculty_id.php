<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveStructrureFieldsAndAddFacultyId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('structure_id');
            $table->dropColumn('structure_type');

            $table->integer('faculty_id')
                ->unsigned()
                ->nullable();

            $table->foreign('faculty_id')
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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('structure_id')
                ->unsigned()
                ->nullable();
            $table->string('structure_type')
                ->nullable();

            $table->dropForeign('users_faculty_id_foreign');
            $table->dropColumn('faculty_id');
        });
    }
}
