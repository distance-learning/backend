<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table
                ->string('slug')
                ->unique()
            ;

            $table
                ->integer('department_id')
                ->unsigned()
            ;

            $table
                ->foreign('department_id')
                ->references('id')
                ->on('departments')
            ;

            $table->integer('year_of_entry');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
