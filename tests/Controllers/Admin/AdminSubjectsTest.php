<?php

class AdminSubjectsTest extends TestCase
{
    public function testGetPaginatedSubjectsAction()
    {
        $this->checkAuthPermission('get', '/api/admin/subjects');

        $request = $this->get('/api/admin/subjects', [
            'Authorization' => $this->getToken()
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(0, $content['data']);

        factory(App\Faculty::class, 1)->create();
        factory(App\Subject::class, 15)->create();

        $request = $this->get('/api/admin/subjects', [
            'Authorization' => $this->getToken()
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(10, $content['data']);
        $this->assertEquals(2, $content['last_page']);

        $request = $this->get('/api/admin/subjects?count=2', [
            'Authorization' => $this->getToken()
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(2, $content['data']);
        $this->assertEquals(8, $content['last_page']);
    }

    public function testGetSubject()
    {
        $request = $this->get('/api/admin/subjects/OOP', [
            'Authorization' => $this->getToken()
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        factory(\App\Faculty::class, 1)->create();
        $subject = factory(App\Subject::class, 'OOP')->create();
        $subject = $subject->toArray();

        $this->checkAuthPermission('get', '/api/admin/subjects/1');

        $request = $this->get('/api/admin/subjects/1', [
            'Authorization' => $this->getToken()
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($subject, $content);
    }

    public function testCreateSubject()
    {
        $this->checkAuthPermission('post', '/api/admin/subjects');

        factory(App\Faculty::class, 1)->create();

        $request = $this->post('/api/admin/subjects', [
            'name' => 'First',
            'description' => 'First subject',
            'faculty_id' => '1'
        ], [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(201, $statusCode);

        $request = $this->get('/api/admin/subjects/1', [
            'Authorization' => $this->getToken(),
        ]);

        $direction = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $content = array_merge($content, [
            'deleted_at' => null,
        ]);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($direction, $content);
    }
}
