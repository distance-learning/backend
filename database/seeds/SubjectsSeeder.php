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
                'faculty_id' => 5
            ],
            [
                'name' => 'Веб-програмування',
                'description' => '',
                'faculty_id' => 5
            ],
            [
                'name' => 'Англійська мова',
                'description' => '',
                'faculty_id' => 2
            ],
            [
                'name' => 'Німецька мова',
                'description' => '',
                'faculty_id' => 1
            ],
            [
                'name' => 'Історія',
                'description' => '',
                'faculty_id' => 3
            ],
            [
                'name' => 'Філософія',
                'description' => '',
                'faculty_id' => 4
            ]
        ];

        foreach ($subjects as $subject) {
            \App\Subject::create($subject);
        }
    }
}
