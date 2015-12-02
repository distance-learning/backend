<?php

use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'name' => 'Програмування',
                'description' => '',
                'department_id' => 5
            ],
            [
                'name' => 'Веб-програмування',
                'description' => '',
                'department_id' => 5
            ],
            [
                'name' => 'Англійська мова',
                'description' => '',
                'department_id' => 2
            ],
            [
                'name' => 'Німецька мова',
                'description' => '',
                'department_id' => 1
            ],
            [
                'name' => 'Історія',
                'description' => '',
                'department_id' => 3
            ],
            [
                'name' => 'Філософія',
                'description' => '',
                'department_id' => 4
            ]
        ];

        foreach ($subjects as $subject) {
            \App\Subject::create($subject);
        }
    }
}
