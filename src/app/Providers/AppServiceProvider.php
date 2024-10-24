<?php

namespace App\Providers;

use App\Http\Resources\Account\UserResource;
use App\Http\Resources\Languages\MinifiedLanguageResource;
use App\Services\Account\AccountService;
use App\Services\Project\ProjectService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('account_service', AccountService::class);
        $this->app->bind('project_service', ProjectService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        UserResource::withoutWrapping();
        MinifiedLanguageResource::withoutWrapping();
    }
}
