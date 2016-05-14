<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacultiesTest extends TestCase
{
    /**
     *
     */
    public function testGetFaculties()
    {
        //Assert if table is empty
        $json = $this->call('GET', '/api/faculties');
        $response = (array) json_decode($json->content());

        $this->assertEquals(0, count($response['data']));

        $faculties = factory(App\Faculty::class, 10)->create();

        //Assert for default count attribute
        $json = $this->call('GET', '/api/faculties');
        $response = (array) json_decode($json->content());

        $this->assertEquals(5, count($response['data']));

        //Assert for 10 faculties
        $json = $this->call('GET', '/api/faculties?count=10');
        $response = (array) json_decode($json->content());

        $this->assertEquals(count($faculties), count($response['data']));

        //Assert of count pages
        $json = $this->call('GET', '/api/faculties?count=2');
        $response = (array) json_decode($json->content());

        $this->assertEquals(5, $response['last_page']);
    }

    /**
     *
     */
    public function testGetFaculty()
    {
        $json = $this->call('GET', '/api/faculties/fotius');
        $response = (array) json_decode($json->content());

        $this->assertResponseStatus(404);

        $faculty = factory(App\Faculty::class, 'fotius')->create();

        $json = $this->call('GET', '/api/faculties/fotius');
        $response = (array) json_decode($json->content());

        $faculty = $faculty->toArray();
        $faculty = array_merge($faculty, [
            'deleted_at' => null,
            'directions' => [],
        ]);

        $this->assertEquals($response, $faculty);
    }

    /**
     *
     */
    public function testGetRandomFaculty()
    {
        $json = $this->call('GET', '/api/faculties/random');
        $response = (array) json_decode($json->content());

        $this->assertEquals(0, count($response));

        factory(App\Faculty::class, 10)->create();

        $json = $this->call('GET', '/api/faculties/random');
        $response = (array) json_decode($json->content());

        $this->assertEquals(4, count($response));
    }
}
