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
                'slug' => \Illuminate\Support\Str::slug('admin-university'),
                'status' => 1
            ]
        ];

        foreach ($users as $user) {
            \App\User::create([
                'name' => $user['name'],
                'surname' => $user['surname'],
                'birthday' => $user['birthday'],
                'phone' => $user['phone'],
                'role' => $user['role'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'slug' => $user['slug'],
                'status' => $user['status']
            ]);
        }
    }
}
