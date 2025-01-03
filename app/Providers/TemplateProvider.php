<?php

namespace App\Providers;

use App\Models\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TemplateProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('front.layout.template', function ($view) {
            // $category = Category::latest()->get();
            $configKey = [
                'logo', 
                'blogname',
                'title',
                'caption',
                'ads_widget',
                'ads_header',
                'ads_footer',
                'phone',
                'email',
                'facebook',
                'youtube',
                'instagram',
                'footer' //cara manggil {{ $config['footer'] }}
            ];
            $config = Config::whereIn('name', $configKey)->pluck('value', 'name');

            $view->with('config', $config);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
