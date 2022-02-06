<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use App\Repositories\CompanyRepository;
use App\Repositories\ElasticsearchRepository;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use App\Models\Company;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(CompanyRepositoryInterface::class, function($app){
            if (! config('services.search.enabled')) {
                return new CompanyRepository($app->make(Company::class));
            }

            return new ElasticsearchRepository(
                $app->make(Client::class), $app->make(Company::class)
            );
        });

        $this->bindSearchClient();
    }

    private function bindSearchClient()
    {
        $this->app->bind(Client::class, function ($app) {
            return ClientBuilder::create()
                ->setHosts($app['config']->get('services.search.hosts'))
                ->build();
        });
    }
}
