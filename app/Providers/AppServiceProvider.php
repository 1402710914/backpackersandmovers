<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (! $this->app->runningInConsole() && $this->app->has('request')) {
            $request = $this->app->make('request');
            if ($request->getHttpHost() !== '') {
                $root = rtrim($request->getSchemeAndHttpHost().$request->getBasePath(), '/');
                URL::forceRootUrl($root);

                if (! filled(env('ASSET_URL'))) {
                    URL::useAssetOrigin($root);
                }
            }
            if ($request->isSecure()) {
                URL::forceScheme('https');
            }
        }

        if (filled(env('ASSET_URL'))) {
            URL::useAssetOrigin(rtrim((string) env('ASSET_URL'), '/'));
        }

        View::composer('layouts.roavio', function ($view) {
            $navTourCategories = Category::orderedTourNavCategories();

            $view->with([
                'navTourCategories' => $navTourCategories,
                'footerTourCategories' => $navTourCategories,
            ]);
        });
    }
}
