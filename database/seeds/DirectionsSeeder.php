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
            [   //1
                'name' => 'РГФ',
                'description' => 'Завідувач кафедри - Куліш Ірина Миколаївна, доцент, кандидат педагогічних наук',
                'faculty_id' => 3
            ],
            [   //2
                'name' => 'Англійська філологія',
                'description' => 'Завідувач кафедри - Велівченко Валентина Федорівна, доцент, кандидат філологічних наук',
                'faculty_id' => 3
            ],
            [   //3
                'name' => 'Історія',
                'description' => '',
                'faculty_id' => 4
            ],
            [   //4
                'name' => 'Філософія',
                'description' => '',
                'faculty_id' => 4
            ],
            [   //5
                'name' => 'Комп’ютерні науки',
                'description' => '',
                'faculty_id' => 1
            ],
            [   //5
                'name' => 'Програмна інженерія',
                'description' => '',
                'faculty_id' => 1
            ],
            [   //6
                'name'  =>  'Кафедра хімії та наноматеріалознавства',
                'description' =>  '',
                'faculty_id'  =>  6
            ],
            [   //7
                'name'  =>  'Кафедра якості, стандартизації та управління проектами',
                'description' =>  '',
                'faculty_id'  =>  6,
            ],
            [   //8
                'name'  =>  'Кафедра екології та агробіології',
                'description' =>  '',
                'faculty_id'  =>  6
            ],
            [   //9
                'name'  =>  'Кафедра біології та бiохiмiї',
                'description' =>  '',
                'faculty_id'  =>  6
            ],
            [   //10
                'name'  =>  'Кафедра української літератури та компаративістики',
                'description' =>  '',
                'faculty_id'  =>  7
            ],
            [   //11
                'name'  =>  'Кафедра методики навчання, стилістики й культури української мови',
                'description' =>  '',
                'faculty_id'  =>  7
            ],
            [   //12
                'name'  =>  'Кафедра журналістики, реклами та PR-технологій',
                'description' =>  '',
                'faculty_id'  =>  7
            ],
            [   //13
                'name'  =>  'Кафедра видавничої справи, редагування й теорії інформації',
                'description' =>  '',
                'faculty_id'  =>  7
            ],
            [   //14
                'name'  =>  'Кафедра українського мовознавства і прикладної лінгвістики',
                'description' =>  '',
                'faculty_id'  =>  7
            ],
            [   //15
                'name'  =>  'Кафедра фізики',
                'description' =>  '',
                'faculty_id'  =>  8,
            ],
            [   //15
                'name'  =>  'Кафедра анатомії, фізіології та фізичної реабілітації',
                'description' =>  '',
                'faculty_id'  =>  9,
            ],
            [   //
                'name'  =>  'Кафедра спортивних дисциплін',
                'description' =>  '',
                'faculty_id'  =>  9,
            ],
            [
                'name'  =>  'Кафедра теорії і методики фізичного виховання та спортивних ігор',
                'description' =>  '',
                'faculty_id'  =>  9,
            ],
            [
                'name'  =>  'Кафедра фізичного виховання',
                'description' =>  '',
                'faculty_id'  =>  9,
            ],
            [
                'name'  =>  'Кафедра психології',
                'description' =>  '',
                'faculty_id'  =>  10,
            ],
            [
                'name'  =>  'Кафедра практичної психології',
                'description' =>  '',
                'faculty_id'  =>  10,
            ],
            [
                'name'  =>  'Кафедра прикладної психології',
                'description' =>  '',
                'faculty_id'  =>  10,
            ],
        ];

        foreach ($directions as $direction) {
            \App\Direction::create($direction);
        }
    }
}
