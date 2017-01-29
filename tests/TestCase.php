<?php

namespace Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use JWTAuth;
use App\Models\User;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use DatabaseMigrations;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://distance-learning.local';

    /**
     * @var null
     */
    private $authUser = null;

    /**
     * @var null
     */
    private $authUserToken = null;

    /**
     * Creates the application.
     *
     * @return Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function getToken()
    {
        return 'Bearer ' . $this->getAuthUserToken();
    }

    public function getAuthUser()
    {
        if (!$this->authUser) {
            $this->setAuthUserToken();
        }

        return $this->authUser;
    }

    public function getAuthUserToken()
    {
        if (!$this->authUserToken) {
            $this->setAuthUserToken();
        }

        return $this->authUserToken;
    }

    private function setAuthUserToken()
    {
        $authUser = factory(User::class)->create();

        $this->authUser = $authUser;
        $this->authUserToken = JWTAuth::fromUser($authUser);
    }

    public function setUp()
    {
        parent::setUp();

//        DB::statement("SET foreign_key_checks=0");
//        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
//
//        foreach ($tableNames as $name) {
//            //if you don't want to truncate migrations
//            if ($name == 'migrations') {
//                continue;
//            }
//            DB::table($name)->truncate();
//        }
//        DB::statement("SET foreign_key_checks=1");
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    public function checkAuthPermission($method, $uri, $data = [])
    {
        $request = $this->{$method}($uri, $data);

        $statusCode = $request->response->getStatusCode();

        $this->assertEquals(400, $statusCode);
    }
}
