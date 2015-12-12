<?php

use Illuminate\Database\Seeder;

class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directions = [
            [
                'name' => 'РГФ',
                'description' => 'Завідувач кафедри - Куліш Ірина Миколаївна, доцент, кандидат педагогічних наук',
                'faculty_id' => 3
            ],
            [
                'name' => 'Англійська філологія',
                'description' => 'Завідувач кафедри - Велівченко Валентина Федорівна, доцент, кандидат філологічних наук',
                'faculty_id' => 3
            ],
            [
                'name' => 'Історія',
                'description' => '',
                'faculty_id' => 4
            ],
            [
                'name' => 'Філософія',
                'description' => '',
                'faculty_id' => 4
            ],
            [
                'name' => 'Комп’ютерні науки',
                'description' => '',
                'faculty_id' => 1
            ],
            [
                'name' => 'Програмна інженерія',
                'description' => '',
                'faculty_id' => 1
            ],
        ];

        foreach ($directions as $direction) {
            \App\Direction::create($direction);
        }
    }
}
