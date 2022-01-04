<?php

namespace Modules\Lesson\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Lesson\Repositories\Eloquent\BaseRepository;
use Modules\Lesson\Repositories\Eloquent\FieldRepository;
use Modules\Lesson\Repositories\Eloquent\LessonRepository;
use Modules\Lesson\Repositories\EloquentRepositoryInterface;
use Modules\Lesson\Repositories\FieldRepositoryInterface;
use Modules\Lesson\Repositories\LessonRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, LessonRepository::class);

        $this->app->bind(FieldRepositoryInterface::class, FieldRepository::class);
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
