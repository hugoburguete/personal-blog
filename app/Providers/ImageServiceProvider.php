<?php

namespace ProgrammingBlog\Providers;

use Illuminate\Support\ServiceProvider;
use ProgrammingBlog\Services\ImageService\ImageServiceInterface;
use ProgrammingBlog\Services\ImageService\DefaultImageService;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ImageServiceInterface::class, function ($app) {
            return new DefaultImageService();
        });
    }
}
