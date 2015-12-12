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
                'direction_id' => 5
            ],
            [
                'name' => 'Веб-програмування',
                'description' => '',
                'direction_id' => 5
            ],
            [
                'name' => 'Англійська мова',
                'description' => '',
                'direction_id' => 2
            ],
            [
                'name' => 'Німецька мова',
                'description' => '',
                'direction_id' => 1
            ],
            [
                'name' => 'Історія',
                'description' => '',
                'direction_id' => 3
            ],
            [
                'name' => 'Філософія',
                'description' => '',
                'direction_id' => 4
            ]
        ];

        foreach ($subjects as $subject) {
            \App\Subject::create($subject);
        }
    }
}
