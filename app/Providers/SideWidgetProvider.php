<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use illuminate\Database\Eloquent\Builder;

class SideWidgetProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('front.layout.side-widget', function ($view) {
            // $category = Category::latest()->get();
            $category = Category::withCount(['Articles'=>function (Builder $query){
                $query->where('status', 1);
            }])->latest()->get();

            $view->with('categories', $category);
        });

        View::composer('front.layout.side-widget', function ($view) {
            $posts = Article::orderBy('views' , 'desc')->take(3)->get();
            $config = Config::where('name', 'ads_widget')->pluck('value', 'name');

            $view->with('config', $config);
            $view->with('popular_posts', $posts);
        });

        View::composer('front.layout.navbar', function ($view) {
            
            $category = Category::latest()->take(3)->get();

            $view->with('categories_navbar', $category);
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
