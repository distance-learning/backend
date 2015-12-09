<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeachersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetRandomTeachers()
    {
        $json = $this->call('GET', '/api/teachers/random');
        $response = (array) json_decode($json->content());

        $this->assertEquals(0, count($response));

        $teachers = factory(App\User::class, 'teachers', 10)->create();

        $json = $this->call('GET', '/api/teachers/random');
        $response = (array) json_decode($json->content());

        $this->assertEquals(6, count($response));
    }
}
