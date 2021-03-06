<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_file', function (Blueprint $table) {
            $table->integer('file_id')->unsigned()->nullable();
            $table->integer('task_id')->unsigned()->nullable();

            $table->foreign('file_id')->references('id')->on('files')->onDelete('SET NULL');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('SET NULL');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('task_file', function (Blueprint $table) {
            $table->dropForeign('task_file_file_id_foreign');
            $table->dropForeign('task_file_task_id_foreign');

            $table->dropColumn('file_id');
            $table->dropColumn('task_id');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->text('files');
        });
    }
}
