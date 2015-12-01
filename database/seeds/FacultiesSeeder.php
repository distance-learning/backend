<?php

use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'ФОТІУС',
                'description' => 'Факультет обчилювальної техніки, інтелектуальних та управляючих систем',
                'avatar' => ''
            ],
            [
                'name' => 'ННІ економіки і права',
                'description' => 'ННІ економіки і права',
                'avatar' => ''
            ],
            [
                'name' => 'ННІ іноземних мов',
                'description' => ' ННІ іноземних мов',
                'avatar' => ''
            ],
            [
                'name' => 'ННІ історії і філософії',
                'description' => 'ННІ історії і філософії',
                'avatar' => ''
            ],
            [
                'name' => 'ННІ педагогічної освіти, соціальної роботи і мистецтва',
                'description' => 'ННІ педагогічної освіти, соціальної роботи і мистецтва',
                'avatar' => ''
            ]
        ];

        foreach ($data as $element) {
            \App\Faculty::create($element);
        }
    }
}
