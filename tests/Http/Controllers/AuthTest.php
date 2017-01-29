<?php

namespace Tests\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testRegistrationAction()
    {
        $data = [
            'name'  =>  'Test',
            'surname'  =>   'User',
            'email'   =>  'user1@test.com',
            'phone'  =>   '',
            'birthday'   =>   '14.02.1994',
            'password'  =>    '112233',
            'password_confirmation'   =>    '112233'
       ];

        $request = $this->post('/api/auth/registration', $data);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($data['name'], $content['user']['name']);
        $this->assertEquals($data['surname'], $content['user']['surname']);
        $this->assertEquals($data['email'], $content['user']['email']);
        $this->assertEquals($data['birthday'], $content['user']['birthday']);

        $data = [
            'name'  =>  'Test',
            'surname'  =>   'User',
            'email'   =>  'user2@test.com',
            'phone'  =>   '',
            'birthday'   =>   '14.02.1994',
            'password'  =>    '112233',
       ];

        $request = $this->post('/api/auth/registration', $data);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(302, $statusCode);
    }

    public function testLoginAction()
    {
        /** @var Request $request */
        $request = $this->post('/api/auth/login', [
            'email' => 'user@test.com',
            'password' => '112233'
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(401, $statusCode);

        factory(User::class, 'auth-user')->create();

        $request = $this->post('/api/auth/login', [
            'email' => 'auth@mail.ru',
            'password' => '112233'
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertArrayHasKey("user", $content);
        $this->assertArrayHasKey("token", $content);
    }
}
