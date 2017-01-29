<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository extends AbstractRepository
{
    /**
     * @var string
     */
    protected $modelName = Course::class;
}
