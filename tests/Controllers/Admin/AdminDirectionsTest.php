<?php

class AdminDirectionsTest extends TestCase
{
    public function testGetDirections()
    {
        $request = $this->get('/api/admin/directions', [
            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
        ]);

        $content = (array) json_decode($request->response->getContent());

        $this->assertCount(0, $content['data']);
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

        $content = $request->response->getContent();
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(201, $statusCode);
    }
}
