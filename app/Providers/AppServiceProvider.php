<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\File;
use App\Http\Requests\Request;
use App\Models\Module;
use App\Service\TestAnswersExport;
use App\Service\TestsResultService;
use App\Models\Test;
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
            'module' => Module::class,
        ]);

        Course::created(function (Course $course) {
            $course->name = $course->group->name . ' ' . $course->subject->name . ' ' . $course->teacher->full_name;
        });

        $this->registerServices();
    }

    /**
     *
     */
    private function registerServices()
    {
        $this->app->singleton(TestsResultService::class, function () {
            /** @var Request $request */
            $request = app(Request::class);

            return new TestsResultService($request->getUser());
        });

        $this->app->singleton(TestAnswersExport::class, function () {
            /** @var Request $request */
            $request = app(Request::class);

            return new TestAnswersExport($request->getUser());
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
