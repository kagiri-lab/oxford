<?php

namespace app\routes;

use app\controllers\api\SelectLocationController;
use kilyte\Application;

class API
{

    public function __construct(Application $application)
    {
        $this->load($application->router);
    }

    private function load($router)
    {
        $router->get(SelectLocationController::class, [
            '/' => 'index',
            '/counties' => 'getCounties',
            '/county/{county}' => 'getConstituencies',
            '/constituency/{constituency}' => 'getWards'
        ], 'api');

    }
}
