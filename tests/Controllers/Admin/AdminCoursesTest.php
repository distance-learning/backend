<?php
//
//
//class AdminCoursesTest extends TestCase
//{
//    public function testGetCourses()
//    {
//        $request = $this->get('/api/admin/courses', [
//            'Authorization' => 'Bearer ' . $this->getAuthUserToken(),
//        ]);
//
//        $content = (array) json_decode($request->response->getContent());
//        $statusCode = $request->response->getStatusCode();
//
//        $this->assertEquals(200, $statusCode);
//        $this->assertCount(0, $content['data']);
//    }
//}
