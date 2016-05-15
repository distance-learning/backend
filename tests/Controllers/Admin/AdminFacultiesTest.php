<?php

class AdminFacultiesTest extends TestCase
{
    public function testGetFaculties()
    {
        $this->checkAuthPermission('get', '/api/admin/faculties');

        $request = $this->get('/api/admin/faculties', [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(0, $content['data']);

        factory(\App\Faculty::class, 20)->create();

        $request = $this->get('/api/admin/faculties', [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(10, $content['data']);
        $this->assertEquals(2, $content['last_page']);

        $request = $this->get('/api/admin/faculties?count=2', [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertCount(2, $content['data']);
        $this->assertEquals(10, $content['last_page']);
    }

    public function testGetFacultyAction()
    {
        $request = $this->get('/api/admin/faculties/fotius', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);

        $faculty = factory(App\Faculty::class, 'fotius')->create();

        $this->checkAuthPermission('get', '/api/admin/faculties/fotius');

        $request = $this->get('/api/admin/faculties/fotius', [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $faculty = $faculty->toArray();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($faculty, $content);
    }

    public function testPostFacultyAction()
    {
        $this->checkAuthPermission('post', '/api/admin/faculties', [
            'name' => 'Faculty name',
            'description' => 'Faculty description',
            'avatar' => '',
            'examinations' => [
                'Examination 1',
                'Examination 2',
            ],
        ]);

        $request = $this->post('/api/admin/faculties', [
            'name' => 'Faculty',
            'description' => 'Faculty description',
            'avatar' => '',
            'examinations' => [
                'Examination 1',
                'Examination 2',
            ],
        ], [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(201, $statusCode);

        $request = $this->get('/api/admin/faculties/faculty', [
            'Authorization' => $this->getToken(),
        ]);

        $direction = json_decode($request->response->getContent(), 1);
        $statusCode = $request->response->getStatusCode();

        $content = array_merge($content, [
            'deleted_at' => null,
            'avatar'     => null,
        ]);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($direction, $content);
    }

    public function testPutFacultyAction()
    {
        $faculty = factory(App\Faculty::class, 'fotius')->create();
        $faculty = $faculty->toArray();

        $faculty['name'] = 'Faculty name 2';
        $faculty['description'] = 'Faculty description 2';
        $faculty['examinations'] = [
            'Examination 4',
            'Examination 5',
        ];

        $this->checkAuthPermission('put', '/api/admin/faculties/fotius', [
            'name' => $faculty['name'],
            'description' => $faculty['description'],
            'avatar' => '',
            'examinations' => $faculty['examinations']
        ]);

        $request = $this->put('/api/admin/faculties/fotius', [
            'name' => $faculty['name'],
            'description' => $faculty['description'],
            'avatar' => '',
            'examinations' => $faculty['examinations']
        ], [
            'Authorization' => $this->getToken(),
        ]);

        $content = json_decode($request->response->getContent(), 1);
        $content["examinations"] = json_decode($content["examinations"], 1);
        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($faculty, $content);
    }

    public function testDeleteFacultyAction()
    {
        factory(App\Faculty::class, 'fotius')->create();

        $this->checkAuthPermission('delete', '/api/admin/faculties/fotius');

        $request = $this->get('/api/admin/faculties/fotius', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(200, $statusCode);


        $request = $this->delete('/api/admin/faculties/fotius', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(204, $statusCode);

        $request = $this->get('/api/admin/faculties/fotius', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);
    }
}
