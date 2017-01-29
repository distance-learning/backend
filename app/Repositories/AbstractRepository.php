<?php

namespace App\Repositories;

use App;
use Illuminate\Database\Eloquent\Model;

/**
 * Abstract class AbstractRepository
 * @package App\Repositories
 */
abstract class AbstractRepository
{
    /**
     * @var string
     */
    protected $modelName;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var App
     */
    protected $app;

    /**
     * AbstractRepository constructor.
     *
     * @param App $app
     */
    final public function __construct(App $app)
    {
        $this->app = $app;
        $this->model = $this->createModel();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function createModel()
    {
        /** @var Model $model */
        $model = $this->app->make($this->modelName);

        return $model->newQuery();
    }
}
