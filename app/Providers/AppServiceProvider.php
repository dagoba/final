<?php

namespace App\Providers;

use App\Http\Repository\ClientRepository;
use App\Http\Repository\ClientRepositoryInterface;

use App\Http\Services\ClientService;
use App\Http\Services\ClientServiceInterface;

use App\Http\Repository\DocRepository;
use App\Http\Repository\DocRepositoryInterface;

use App\Http\Services\DocService;
use App\Http\Services\DocServiceInterface;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientServiceInterface::class, ClientService::class);
        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);

        $this->app->bind(DocRepositoryInterface::class, DocRepository::class);
        $this->app->bind(DocRepositoryInterface::class, DocRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
