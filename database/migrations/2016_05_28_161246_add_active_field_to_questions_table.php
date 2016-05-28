<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveFieldToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table
                ->boolean('is_active')
                ->default(0)
            ;
            $table
                ->boolean('is_skip')
                ->default(0)
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
        Schema::table('questions', function (Blueprint $table) {
            $table
                ->dropColumn([
                    'is_active',
                    'is_skip',
                ])
            ;
        });
    }
}
