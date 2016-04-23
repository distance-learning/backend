<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table
                ->increments('id')
            ;

            $table
                ->integer('attachment_id')
                ->unsigned()
            ;

            $table
                ->string('attachment_type')
            ;

            $table
                ->integer('sender_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->integer('recipient_id')
                ->unsigned()
                ->nullable()
            ;

            $table
                ->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL')
            ;

            $table
                ->foreign('recipient_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL')
            ;

            $table
                ->timestamp('deadline')
                ->nullable()
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
        Schema::dropIfExists('tasks');
    }
}
