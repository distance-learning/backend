<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAvatarFieldToAvatarIdInFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table
                ->dropColumn('avatar')
            ;

            $table
                ->integer('avatar_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->foreign('avatar_id')
                ->references('id')
                ->on('files')
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
        Schema::table('faculties', function (Blueprint $table) {
            $table
                ->dropForeign('faculties_avatar_id_foreign')
            ;

            $table
                ->dropColumn('avatar_id')
            ;

            $table
                ->string('avatar')
            ;
        });
    }
}
