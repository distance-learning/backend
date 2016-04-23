<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table
                ->increments('id')
            ;

            $table
                ->string('filename')
            ;

            $table
                ->string('path')
            ;

            $table
                ->integer('author_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL')
            ;

            $table
                ->timestamps()
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
        Schema::dropIfExists('files');
    }
}
