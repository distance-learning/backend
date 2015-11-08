<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');

            $table
                ->string('avatar')
                ->nullable()
            ;

            $table
                ->date('birthday')
                ->nullable()
            ;

            $table
                ->string('phone')
                ->nullable()
            ;

            $table
                ->string('slug')
                ->unique()
            ;

            $table->string('role');
            $table
                ->integer('structure_id')
                ->nullable()
            ;
            $table
                ->string('structure_type')
                ->nullable()
            ;

            $table
                ->string('email')
                ->unique()
            ;

            $table
                ->string('token')
                ->nullable()
            ;

            $table
                ->boolean('status')
                ->default(false)
            ;

            $table->string('password', 60);
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
