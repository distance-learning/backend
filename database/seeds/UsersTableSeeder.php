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
                'password' => '111111',
                'status' => 1
            ],
            [
                'name' => 'Програмування',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher7@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    1,
                    2
                ]
            ],
            [
                'name' => 'Програмування2',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher1@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    1
                ]
            ],
            [
                'name' => 'Англійського',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher5@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    3
                ]
            ],
            [
                'name' => 'Іноземного',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher4@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    3,
                    4
                ]
            ],
            [
                'name' => 'Історії',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher2@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    5,
                    6
                ]
            ],
            [
                'name' => 'Історії2',
                'surname' => 'Викладач',
                'birthday' => '10.11.2015',
                'phone' => '+380931111111',
                'role' => 'teacher',
                'email' => 'teacher3@admin.com',
                'password' => '111111',
                'status' => 1,
                'subjects' => [
                    6,
                    5
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
                'status' => $user['status']
            ]);

            if ($user['role'] == 'teacher') {
                foreach ($user['subjects'] as $subject) {
                    $userObject->subjects()->attach($subject);
                }
            }
        }
    }
}
