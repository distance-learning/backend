<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'surname' => 'University',
                'birthday' => '8.11.2015',
                'phone' => '+380931111111',
                'role' => 'administrator',
                'email' => 'admin@admin.com',
                'description' => 'Admin',
                'password' => '111111',
                'status' => 1
            ],
            [
                'name' => 'Вася',
                'surname' => 'Пупкин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher7@admin.com',
                'password' => '111111',
                'description' => 'Опис викладача',
                'status' => 1,
                'subjects' => [
                    1,
                    2
                ]
            ],
            [
                'name' => 'Вася',
                'surname' => 'Муткин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher1@admin.com',
                'password' => '111111',
                'status' => 1,
                'description' => 'Опис викладача Васи Пупкин',
                'subjects' => [
                    1
                ]
            ],
            [
                'name' => 'Витя',
                'surname' => 'Гудкин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher5@admin.com',
                'password' => '111111',
                'description' => 'Опис викладача',
                'status' => 1,
                'subjects' => [
                    3
                ]
            ],
            [
                'name' => 'Миня',
                'surname' => 'Витькин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher4@admin.com',
                'password' => '111111',
                'description' => 'Опис викл',
                'status' => 1,
                'subjects' => [
                    3,
                    4
                ]
            ],
            [
                'name' => 'Лися',
                'surname' => 'Вудкин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher2@admin.com',
                'password' => '111111',
                'status' => 1,
                'description' => 'Опис виклл',
                'subjects' => [
                    5,
                    6
                ]
            ],
            [
                'name' => 'Вася',
                'surname' => 'Курткин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher3@admin.com',
                'password' => '111111',
                'status' => 1,
                'description' => 'Опис васи курткина',
                'subjects' => [
                    6,
                    5
                ]
            ],
            [
                'name' => 'Вася',
                'surname' => 'Куcткин',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher10@admin.com',
                'password' => '111111',
                'status' => 1,
                'description' => 'Опис васи куcткина',
                'subjects' => [
                    6,
                    2
                ]
            ],
        ];

        foreach ($users as $user) {
            $userObject = \App\User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'birthday' => $user['birthday'],
                'phone' => $user['phone'],
                'role' => $user['role'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'status' => $user['status'],
                'description' => $user['description']
            ]);

            if ($user['role'] == 'teacher') {
                foreach ($user['subjects'] as $subject) {
                    $userObject->subjects()->attach($subject);
                }
            }
        }
    }
}
