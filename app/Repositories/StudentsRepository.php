<?php

namespace App\Repositories;

use App\Models\User;

class StudentsRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $modelName = User::class;
}
