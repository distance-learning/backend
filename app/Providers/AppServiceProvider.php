<?php

namespace App\Providers;

use App\Course;
use App\File;
use App\Test;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'file' => File::class,
            'test' => Test::class,
        ]);

        Course::created(function (Course $course) {
            $course->name = $course->group->name . ' ' . $course->subject->name . ' ' . $course->teacher->full_name;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
