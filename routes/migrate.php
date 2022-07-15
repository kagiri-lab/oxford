<?php

namespace app\routes;

use kilyte\Application;
use kilyte\database\Migration;

class Migrate{

    private Application $app;

    public function __construct(Application $application)
    {
        $this->app = $application;
        $this->register();
    }

    public function register(){

        $this->app->router->get(Migration::class, [
            'tables' => 'apply'
        ]);
    }

}