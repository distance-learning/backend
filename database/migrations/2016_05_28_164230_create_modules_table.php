<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('content');
            $table->string('type');

            $table->integer('module_group_id')->unsigned();
            $table->foreign('module_group_id')->references('id')->on('module_groups')->onDelete('CASCADE');

            $table->integer('test_id')->unsigned()->nullable();
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modules');
    }
}
