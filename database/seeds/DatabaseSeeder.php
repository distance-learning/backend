<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(FacultiesSeeder::class);
        $this->call(DirectionsSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
