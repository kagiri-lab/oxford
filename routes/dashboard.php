<?php

namespace app\routes;

use app\controllers\dashboard\AgentsController;
use app\controllers\dashboard\AuthController;
use app\controllers\dashboard\CandidateController;
use app\controllers\dashboard\DashboardController;
use kilyte\Application;

class Dashboard
{

    public function __construct(Application $application)
    {
        $this->route($application->router);
    }

    public function route($route)
    {
        $route->get(DashboardController::class, [
            '/' => 'index',
        ], 'admin', 'auth');

        $route->get(AuthController::class, [
            '/login' => 'login',
            '/register' => 'register',
            '/reset-password' => 'resetPassword',
            '/forgot-password' => 'forgotPassword',
            '/confirm-email' => 'confirmEmail',
            '/logout' => 'Logout'
        ], 'admin');

        $route->post(AuthController::class, [
            '/login' => 'login',
            '/register' => 'register',
            '/reset-password' => 'resetPassword',
            '/forgot-password' => 'forgotPassword',
            '/confirm-email' => 'confirmEmail',
            '/logout' => 'Logout'
        ], 'admin');


        $route->get(CandidateController::class, [
            '/register' => 'registerCandidate',
            '/list' => 'getall',
            '/view/{candidate}' => 'get'
        ], 'admin/candidates', 'auth');

        $route->post(CandidateController::class, [
            '/register' => 'registerCandidate'
        ], 'admin/candidates', 'auth');

        $route->get(AgentsController::class, [
            '/register' => 'registerAgent',
            '/list' => 'allAgents',
            '/users/all' => 'allUsers',
        ], 'admin/agents', 'auth');

        $route->post(AgentsController::class, [
            '/register' => 'registerAgent'
        ], 'admin/agents', 'auth');
    }
}
