<?php

namespace App\Providers;

use App;
use App\Models\Course;
use App\Models\File;
use App\Http\Requests\Request;
use App\Services\TestsResultService;
use App\Services\TestAnswersExportService;
use App\Models\Module;
use App\Models\Test;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use App\Services\FileUploaderService;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerServices();
    }

    /**
     * @return void
     */
    private function registerServices()
    {
        $this->app->singleton(TestsResultService::class, function (App $app) {
            /** @var Request $request */
            $request = $app->make(Request::class);

            return new TestsResultService($request->user());
        });

        $this->app->singleton(TestAnswersExportService::class, function (App $app) {
            /** @var Request $request */
            $request = $app->make(Request::class);

            return new TestAnswersExportService($request->user());
        });

        $this->app->singleton(FileUploaderService::class, function (App $app) {
            /** @var Request $request */
            $request = $app->make(Request::class);

            return new FileUploaderService($request->user(), $request);
        });
    }
}
