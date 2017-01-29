<?php

namespace Tests\Http\Controllers;

use App\Models\User;
use Tests\TestCase;

class TeachersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetRandomTeachers()
    {
        $request = $this->get('/api/teachers/random');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(0, $content);

        factory(User::class, 'teachers', 10)->create();

        $request = $this->get('/api/teachers/random');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(6, $content);
    }

    /**
     *
     */
    public function testGetTeachers()
    {
        $request = $this->get('/api/teachers');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(0, $content);

        factory(User::class, 'teachers', 10)->create();

        $request = $this->get('/api/teachers');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(10, $content);
    }

    public function testGetTeacher()
    {
        $request = $this->get('/api/teachers/fotius');

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        $teacher = factory(User::class, 'teacher-active')->create();

        $request = $this->get('/api/teachers/user-test');

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $teacher = $teacher->toArray();
        $teacher = array_merge($teacher, [
            'deleted_at' => null,
            'status'   => true,
            'avatar' => null,
        ]);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($teacher, $content);

        factory(User::class, 'teacher-not-active')->create();

        $request = $this->get('/api/teachers/user2-test');

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);
    }
}
