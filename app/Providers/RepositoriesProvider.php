<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use App\Repositories\Contracts\RepositoryInterface;
//use App\Repositories\Repository;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(RepositoryInterface::class, Repository::class);
    }
}
