<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Jobs\MoJob;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(MoJob::class)
            ->needs(BaseRepository::class)
            ->give(function (){

                return "App\\Repositories\\MoRepository";
            });

    }
}
