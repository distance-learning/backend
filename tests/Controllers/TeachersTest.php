<?php
//
//use Illuminate\Foundation\Testing\WithoutMiddleware;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;
//
//class TeachersTest extends TestCase
//{
//    /**
//     * A basic test example.
//     *
//     * @return void
//     */
//    public function testGetRandomTeachers()
//    {
//        $json = $this->call('GET', '/api/teachers/random');
//        $response = (array) json_decode($json->content());
//
//        $this->assertEquals(0, count($response));
//
//        factory(App\User::class, 'teachers', 10)->create();
//
//        $json = $this->call('GET', '/api/teachers/random');
//        $response = (array) json_decode($json->content());
//
//        $this->assertEquals(6, count($response));
//    }
//
//    /**
//     *
//     */
//    public function testGetTeachers()
//    {
//        $json = $this->call('GET', '/api/teachers');
//        $response = (array) json_decode($json->content());
//
//        $this->assertEquals(0, count($response));
//
//        factory(App\User::class, 'teachers', 10)->create();
//
//        $json = $this->call('GET', '/api/teachers');
//        $response = (array) json_decode($json->content());
//
//        $this->assertEquals(10, count($response));
//    }
//
//    public function testGetTeacher()
//    {
//        $json = $this->call('GET', '/api/teachers/fotius');
//        json_decode($json->content());
//
//        $this->assertResponseStatus(404);
//
//        $teacher = factory(App\User::class, 'teacher-active')->create();
//
//        $json = $this->call('GET', '/api/teachers/user-test');
//        $response = (array) json_decode($json->content());
//
//        $teacher = $teacher->toArray();
//        $teacher = array_merge($teacher, [
//            'deleted_at' => null,
//            'status'   => true
//        ]);
//
//        $this->assertEquals($response, $teacher);
//
//        factory(App\User::class, 'teacher-not-active')->create();
//
//        $json = $this->call('GET', '/api/teachers/user2-test');
//        json_decode($json->content());
//
//        $this->assertResponseStatus(404);
//    }
//}
