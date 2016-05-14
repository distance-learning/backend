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

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate');
    }

    public function tearDown()
    {
        $this->artisan('migrate:reset');
        parent::tearDown();
    }
}
