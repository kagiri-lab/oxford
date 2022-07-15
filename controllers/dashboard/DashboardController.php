<?php

namespace app\controllers\dashboard;

use Exception;
use kilyte\Application;
use kilyte\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        DashboardController::isAdmin();
        $this->setLayout('dashboard.main');
        return $this->render([], 'dashboard.votes.view');
    }

    public static function isAdmin()
    {
        $user = Application::$app->user->status;
        if (!$user)
            throw new Exception("UnAuthorized Access", 403);
    }
}
