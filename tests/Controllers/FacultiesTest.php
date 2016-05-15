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
        $request = $this->get('/api/faculties');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(0, count($content['data']));

        $faculties = factory(App\Faculty::class, 10)->create();

        //Assert for default count attribute
        $request = $this->get('/api/faculties');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(5, count($content['data']));

        //Assert for 10 faculties
        $request = $this->get('/api/faculties?count=10');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(count($faculties), count($content['data']));

        //Assert of count pages
        $request = $this->get('/api/faculties?count=2');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(5, $content['last_page']);
    }

    /**
     *
     */
    public function testGetFaculty()
    {
        $request = $this->get('/api/faculties/fotius');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        $faculty = factory(App\Faculty::class, 'fotius')->create();

        $request = $this->get('/api/faculties/fotius');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $faculty = $faculty->toArray();
        $faculty = array_merge($faculty, [
            'deleted_at' => null,
            'directions' => [],
        ]);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($faculty, $content);
    }

    /**
     *
     */
    public function testGetRandomFaculty()
    {
        $request = $this->get('/api/faculties/random');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(0, $content);

        factory(App\Faculty::class, 10)->create();

        $request = $this->get('/api/faculties/random');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(4, $content);
    }
}
