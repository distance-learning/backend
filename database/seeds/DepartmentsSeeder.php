<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'name' => 'Кафедра іноземних мов',
                'description' => ' Завідувач кафедри - Куліш Ірина Миколаївна, доцент, кандидат педагогічних наук',
                'faculty_id' => 3
            ],
            [
                'name' => 'Кафедра англійської філології',
                'description' => 'Завідувач кафедри - Велівченко Валентина Федорівна, доцент, кандидат філологічних наук',
                'faculty_id' => 3
            ],
            [
                'name' => 'Кафедра історії та етнології України',
                'description' => '',
                'faculty_id' => 4
            ],
            [
                'name' => 'Кафедра філософії',
                'description' => '',
                'faculty_id' => 4
            ],
            [
                'name' => 'Кафедра програмного забезпечення автоматизованих систем',
                'description' => '',
                'faculty_id' => 1
            ],
            [
                'name' => 'Кафедра інтелектуальних систем прийняття рішень',
                'description' => '',
                'faculty_id' => 1
            ],
        ];

        foreach ($departments as $department) {
            \App\Department::create($department);
        }
    }
}
