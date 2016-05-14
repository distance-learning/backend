<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

//class AuthTest extends TestCase
//{
//    use DatabaseTransactions;

//    public function testRegistrationAction()
//    {
//        $data = [
//            'name'  =>  'Test',
//            'surname'  =>   'User',
//            'email'   =>  'user1@test.com',
//            'phone'  =>   '',
//            'birthday'   =>   '14.02.1994',
//            'password'  =>    '112233',
//            'password_confirmation'   =>    '112233'
//       ];
//
//        $json = $this->call('POST', '/api/auth/registration', $data);
//
//        var_dump($json->getStatusCode());
//        $response = $json->content();
//
//        var_dump($response);
//
//        $this->assertEquals($data['name'], $response['name']);
//        $this->assertEquals($data['surname'], $response['surname']);
//        $this->assertEquals($data['email'], $response['email']);
//        $this->assertEquals($data['birthday'], $response['birthday']);
//
//        $data = [
//            'name'  =>  'Test',
//            'surname'  =>   'User',
//            'email'   =>  'user2@test.com',
//            'phone'  =>   '',
//            'birthday'   =>   '14.02.1994',
//            'password'  =>    '112233',
//       ];
//
//        $json = $this->call('POST', '/api/auth/registration', $data);
//
//        $this->assertResponseStatus(400);
//    }
//
//    public function testLoginAction()
//    {
//        $this->call('POST', '/api/auth/login', [
//            'email' => 'user@test.com',
//            'password' => '112233'
//        ]);
//    }
//}
