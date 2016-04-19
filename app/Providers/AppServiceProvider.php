<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->composePosts();
       $this->composeOpen();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composePosts()
    {
        view()->composer('layout', function($view)
        {
            $view->with('recent_posts', Article::latest('published_at')->published()->take(5)->get());
          //$view->with('latest', Article::published()->latest()->first());
        });
    }  
    
    private function composeOpen()
    {
        view()->composer('layout', function($view)
        {
           $view->with('date', Carbon::now());
        });   
    }
}
