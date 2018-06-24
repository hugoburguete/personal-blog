<?php

namespace ProgrammingBlog\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Classes not to be loaded to the app.
     *
     * @var array
     */
    private $excludedClasses = ['Repository'];

    /**
     * The directories not to include to the tree of repositories loaded to the app.
     * 
     * @var array
     */
    private $excludedDirectories = [
        'Contracts', 
        'Exceptions'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repoDir = dirname(__DIR__).'/Repositories';
        $filesArray = dirToArray($repoDir);

        $this->loadClasses($filesArray);
    }

    /**
     * Registers repository classes
     * 
     * @param  array $filesArray
     * @param  string $base       
     * @return void
     */
    public function loadClasses($filesArray, $base = 'ProgrammingBlog\Repositories\\')
    {
        foreach ($filesArray as $key => $location) {
            if (is_array($location)) {
                // We're dealing with a directory.
                if (!in_array($key, $this->excludedDirectories)) {
                    $this->loadClasses($location, $base.$key.'\\');
                }
            }
            else {
                // We're dealing with a repo file. Let's load it
                $class = str_replace('.php', '', $location);
                if (!in_array($class, $this->excludedClasses)) {
                    $this->app->singleton($class, function($app) {
                        return new $class($app);
                    });
                }
            }
        }
    }
}
