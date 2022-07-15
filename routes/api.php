<?php

namespace app\routes;

use app\controllers\api\APIController;
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\UserController;
use kilyte\Application;
use UserAPIController;

class API
{

    private Application $app;

    public function __construct(Application $application)
    {
        $this->app = $application;
        $this->load();
    }

    private function load()
    {

        $this->app->router->get(AuthController::class, [
            '/' => 'index',
            'users/list/{page}' => 'listAll'
        ], 'api/');

        $this->app->router->post(AuthController::class, [
            '/' => 'index',
            'login' => 'login',
            'register' => 'register',
            'token/generate' => 'generateToken'
        ], 'api/');


        $this->app->router->post(UserController::class, [
            'profile' => 'profile',
            'profile/{username}' => 'profileWithId'
        ], 'api/user');
    }
}
