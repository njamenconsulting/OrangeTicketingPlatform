<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\EloquentRepositoryInterface; 
use App\Repositories\TicketRepositoryInterface; 
use App\Repositories\Eloquent\TicketRepository; 
use App\Repositories\RoleRepositoryInterface; 
use App\Repositories\Eloquent\RoleRepository; 
use App\Repositories\UserRepositoryInterface; 
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\BaseRepository; 


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }
}
