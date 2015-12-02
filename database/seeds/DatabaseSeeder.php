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

         $this->call(UsersTableSeeder::class);
         $this->call(FacultiesSeeder::class);
         $this->call(DepartmentsSeeder::class);
         $this->call(SubjectsSeeder::class);

        Model::reguard();
    }
}
