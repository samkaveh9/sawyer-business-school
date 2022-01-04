<?php

namespace Modules\Student\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Student\Repositories\Eloquent\BaseRepository;
use Modules\Student\Repositories\Eloquent\StudentRepository;
use Modules\Student\Repositories\EloquentRepositoryInterface;
use Modules\Student\Repositories\StudentRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class ,BaseRepository::class,);
        $this->app->bind(StudentRepositoryInterface::class ,StudentRepository::class,);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
