<?php

namespace App\Providers;

use App;
use App\Repositories\CourseRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $repositories = [
        CourseRepository::class,
    ];

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * @return void
     */
    public function map()
    {
        $this->registerRepositories();
    }

    /**
     * @return void
     */
    private function registerRepositories()
    {
        foreach ($this->repositories as $repository) {
            $this->app->singleton($repository, function (App $app) use ($repository) {
                return new $repository($app);
            });
        }
    }
}
