<?php

namespace App\Providers;

use App\Repositories\Developer\DeveloperRepository;
use App\Repositories\Developer\DeveloperRepositoryInterface;
use App\Repositories\Sprint\SprintRepository;
use App\Repositories\Sprint\SprintRepositoryInterface;
use App\Repositories\Task\TaskRepository;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->app->bind(DeveloperRepositoryInterface::class, DeveloperRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(SprintRepositoryInterface::class, SprintRepository::class);
    }
}
