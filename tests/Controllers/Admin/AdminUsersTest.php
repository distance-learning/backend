<?php

class AdminUsersTest extends TestCase
{
    public function testGetUsersAction()
    {
        $this->checkAuthPermission('get', '/api/admin/users');

        $request = $this->get('/api/admin/users', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertCount(1, $content['data']);

        factory(App\User::class, 19)->create();

        $request = $this->get('/api/admin/users', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(2, $content['last_page']);
        $this->assertCount(10, $content['data']);


        $request = $this->get('/api/admin/users?count=2', [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals(10, $content['last_page']);
        $this->assertCount(2, $content['data']);
    }

    public function testGetUserAction()
    {
        $user = $this->getAuthUser();

        $this->checkAuthPermission('get', '/api/admin/users/' . $user->slug);

        $request = $this->get('/api/admin/users/' . $user->slug, [
            'Authorization' => $this->getToken(),
        ]);

        $user = $user->toArray();

        $user['birthday'] = '0000-00-00';
        $user = array_merge($user, [
            'surname' => '',
            'role' => '',
            'status' => false,
            'description' => null,
            'deleted_at' => null,
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($user, $content);
    }

    public function testStoreUserAction()
    {
        $this->checkAuthPermission('post', '/api/admin/users/');

        $user = [
            'name'  =>  'Valik',
            'surname'  =>  'Test',
            'birthday'  =>  '0000-00-00',
            'phone'  =>  '+380938648289',
            'role'  =>  'student',
            'email' =>  'valik.v1per@gmail.com',
            'description' =>  'Hello world',
            'password'  =>  '112233',
            'group_id' => null,
            'slug' => 'test-valik',
        ];

        $request = $this->post('/api/admin/users', $user,[
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(201, $statusCode);
        $this->assertEquals($user['slug'], $content['slug']);

        $request = $this->get('/api/admin/users/' . $user['slug'], [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $user = json_decode($request->response->getContent(), 1);

        $content = array_merge($content, [
            'avatar' => null,
            'description' => null,
            'deleted_at' => null,
            'group' => null,
        ]);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($user, $content);
    }

    public function testUpdateUserAction()
    {
        $user = $this->getAuthUser();
        $user = $user->toArray();

        $user['name'] = 'Vasya';
        $user['email'] = 'vasya@mail.ru';
        $user['phone'] = '+380938648289';
        $user['birthday'] = '1994-09-15';
        $user['password'] = '112233';

        $this->checkAuthPermission('put', '/api/admin/users/' . $user['slug']);

        $request = $this->put('/api/admin/users/' . $user['slug'], $user, [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $user = array_merge($user, [
            'surname' => null,
            'role' => null,
            'status' => true,
            'description' => null,
            'deleted_at' => null,
        ]);

        unset($user['password']);

        $this->assertEquals(200, $statusCode);
        $this->assertEquals($user, $content);

        Auth::logout();

        $request = $this->post('/api/auth/login', [
            'email' => 'vasya@mail.ru',
            'password' => '113233'
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(400, $statusCode);

        $request = $this->post('/api/auth/login', [
            'email' => 'vasya@mail.ru',
            'password' => '112233'
        ]);

        $statusCode = $request->response->getStatusCode();
        $content = json_decode($request->response->getContent(), 1);

        $this->assertEquals(200, $statusCode);
        $this->assertArrayHasKey("user", $content);
        $this->assertArrayHasKey("token", $content);
    }

    public function testDeleteUserAction()
    {
        $user = $this->getAuthUser();

        $this->checkAuthPermission('delete', "/api/admin/users/{$user->slug}");

        $request = $this->delete("/api/admin/users/{$user->slug}", [], [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(204, $statusCode);

        $request = $this->get("/api/admin/users/{$user->slug}", [
            'Authorization' => $this->getToken(),
        ]);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(404, $statusCode);
    }
}
