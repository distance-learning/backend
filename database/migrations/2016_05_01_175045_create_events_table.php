<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

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

            $table->string('attachment_type');
            $table->integer('attachment_id');

            $table->dateTime('deadline');

            $table
                ->foreign('sender_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

            $table
                ->foreign('recipient_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');

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
        Schema::dropIfExists('events');
    }
}
