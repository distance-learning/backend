<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table
                ->string('slug')
                ->unique()
            ;

            $table
                ->text('description')
                ->nullable()
            ;
            $table
                ->integer('faculty_id')
                ->unsigned()
                ->nullable()
            ;
            $table->softDeletes();

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
        Schema::dropIfExists('directions');
    }
}
