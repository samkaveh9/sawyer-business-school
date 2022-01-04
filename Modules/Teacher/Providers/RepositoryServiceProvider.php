<?php

namespace Modules\Teacher\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Teacher\Repositories\Eloquent\BaseRepository;
use Modules\Teacher\Repositories\Eloquent\TeacherRepository;
use Modules\Teacher\Repositories\EloquentRepositoryInterface;
use Modules\Teacher\Repositories\TeacherRepositoryInterface;


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
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
    }

}
