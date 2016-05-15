<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
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
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function getAuthUser()
    {
        if (! $this->authUser) {
            $this->setAuthUserToken();
        }

        return $this->authUser;
    }

    public function getAuthUserToken()
    {
        if (! $this->authUserToken) {
            $this->setAuthUserToken();
        }

        return $this->authUserToken;
    }

    private function setAuthUserToken()
    {
        $authUser = factory(App\User::class)->create();

        $this->authUser = $authUser;
        $this->authUserToken = JWTAuth::fromUser($authUser);
    }

    public function setUp()
    {
        parent::setUp();

        DB::statement("SET foreign_key_checks=0");
        $tableNames = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tableNames as $name) {
            //if you don't want to truncate migrations
            if ($name == 'migrations') {
                continue;
            }
            DB::table($name)->truncate();
        }
        DB::statement("SET foreign_key_checks=1");

//        shell_exec('mysql -u root -Nse \'show tables\' distance_learning_test | while read table; do mysql -u root -e "truncate table $table" distance_learning_test; done');
//        $this->artisan('migrate');
    }

    public function tearDown()
    {
//        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
