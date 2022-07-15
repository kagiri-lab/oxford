<?php

namespace app\routes;

use app\controllers\AuthController;
use app\controllers\site\SiteController;
use app\controllers\site\VotesController;
use app\controllers\UserController;
use kilyte\Application;

class Web
{


    public function __construct(Application $application)
    {
        $this->load($application->router);
    }

    public function load($route)
    {

        $route->get(SiteController::class, [
            '/' => 'siteIndex',
            '/contact' => 'contact',
            '/about' => 'about'
        ]);

        $route->post(AuthController::class, [
            '/login' => 'login',
            '/register' => 'register'
        ]);

        $route->get(AuthController::class, [
            '/login' => 'login',
            '/logout' => 'logout',
            '/register' => 'register'
        ]);


        $route->get(VotesController::class, [
            '/' => 'index',
            '/candidates/{position}' => 'candidates',
            '/candidate/{position}/{candidate}' => 'candidate'
        ], 'votes', 'auth');

        $route->post(VotesController::class, [
            '/candidate/{position}/{candidate}' => 'candidate'
        ], 'votes', 'auth');
    }
}
