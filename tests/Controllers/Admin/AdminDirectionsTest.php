<?php

class AdminDirectionsTest extends TestCase
{
    public function testGetDirections()
    {
        $this->checkAuthPermission('get', '/api/admin/directions');

        $request = $this->get('/api/admin/directions', [
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertCount(0, $content['data']);
        $this->assertEquals(200, $statusCode);

        factory(App\Faculty::class, 1)->create();
        factory(App\Direction::class, 10)->create();

        $request = $this->get('/api/admin/directions', [
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertCount(10, $content['data']);
        $this->assertEquals(200, $statusCode);

        factory(App\Direction::class, 5)->create();

        $request = $this->get('/api/admin/directions', [
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertCount(10, $content['data']);
        $this->assertEquals(2, $content['last_page']);
        $this->assertEquals(200, $statusCode);
    }

    public function testCreateDirection()
    {
        factory(App\Faculty::class, 1)->create();

        $this->checkAuthPermission('post', '/api/admin/directions', [
            'name' => 'First',
            'description' => 'Description',
            'faculty_id' => 1
        ]);

        $request = $this->post('/api/admin/directions', [
            'name' => 'First',
            'description' => 'Description',
            'faculty_id' => 1
        ], [
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(201, $statusCode);

        $request = $this->get('/api/admin/directions/first', [
            'Authorization' => $this->getToken(),
        ]);

        $direction = (array) json_decode($request->response->getContent());

        $content = array_merge($content, [
            'deleted_at' => null,
        ]);

        $this->assertEquals($direction, $content);
    }

    public function testGetDirection()
    {

        $request = $this->get('/api/admin/directions/test', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        factory(App\Faculty::class, 1)->create();
        $direction = factory(App\Direction::class, 'active')->create();
        $direction = $direction->toArray();

        $this->checkAuthPermission('get', '/api/admin/directions/test');

        $request = $this->get('/api/admin/directions/test', [
            'Authorization' => $this->getToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($direction, $content);
    }

    public function testEditDirection()
    {
        factory(App\Faculty::class, 2)->create();
        $direction = factory(App\Direction::class, 'active')->create();
        $direction = $direction->toArray();

        $direction['name'] = 'Second';
        $direction['description'] = 'Another description';
        $direction['faculty_id'] = 2;

        $this->checkAuthPermission('put', '/api/admin/directions/test', [
            'name' => $direction['name'],
            'description' => $direction['description'],
            'faculty_id'  => $direction['faculty_id'],
        ]);

        $request = $this->put('/api/admin/directions/test', [
            'name' => $direction['name'],
            'description' => $direction['description'],
            'faculty_id'  => $direction['faculty_id'],
        ], [
            'Authorization' => $this->getToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($direction, $content);

        $request = $this->get('/api/admin/directions/test', [
            'Authorization' => $this->getToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($direction, $content);
    }

    public function testDeleteDirectionAction()
    {
        factory(App\Faculty::class, 2)->create();
        factory(App\Direction::class, 'active')->create();

        $this->checkAuthPermission('delete', '/api/admin/directions/test');

        $request = $this->get('/api/admin/directions/test', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $this->assertEquals(200, $statusCode);

        $request = $this->delete('/api/admin/directions/test', [], [
            'Authorization' => $this->getToken()
        ]);

        $statusCode = $request->response->getStatusCode();
        $this->assertEquals(204, $statusCode);

        $request = $this->get('/api/admin/directions/test', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $this->assertEquals(404, $statusCode);
    }

    public function testGetGroupsByDirectionSlugAction()
    {

        $request = $this->get('/api/admin/directions/test/groups', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        factory(App\Faculty::class, 1)->create();
        factory(App\Direction::class, 'active')->create();
        factory(App\Group::class, 20)->create();

        $this->checkAuthPermission('get', '/api/admin/directions/test/groups');

        $request = $this->get('/api/admin/directions/test/groups', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = (array) json_decode($request->response->getContent());

        $this->assertEquals(200, $statusCode);
        $this->assertCount(10, $content['data']);
        $this->assertEquals(2, $content['last_page']);

        $request = $this->get('/api/admin/directions/test/groups?count=2', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = (array) json_decode($request->response->getContent());

        $this->assertEquals(200, $statusCode);
        $this->assertCount(2, $content['data']);
        $this->assertEquals(10, $content['last_page']);
    }
}
