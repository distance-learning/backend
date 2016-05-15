<?php

class AdminDirectionsTest extends TestCase
{
    public function testGetDirections()
    {
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
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $direction = (array) json_decode($request->response->getContent());

        $content = array_merge($content, [
            'deleted_at' => null,
        ]);

        $this->assertEquals($direction, $content);
    }
}
