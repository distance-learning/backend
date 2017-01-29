<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAnswerIdAddFilesToTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('tasks_answer_id_foreign');
            $table->dropColumn('answer_id');
            $table->text('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table
                ->integer('answer_id')
                ->unsigned()
                ->nullable();

            $table
                ->foreign('answer_id')
                ->reference('id')
                ->on('answers');

            $table->dropColumn('files');
        });
    }
}
