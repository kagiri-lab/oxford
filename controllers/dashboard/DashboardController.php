<?php

namespace app\controllers\dashboard;

use Exception;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class DashboardController extends Controller
{
    public function index(Request $request, Response $response)
    {
        
        $this->setLayout('dashboard.main');
        $votes = new VotesController;
        return $votes->getPresidential($request, $response);
    }

    public static function isAdmin()
    {
        $user = Application::$app->user->status;
        if (!$user)
            throw new Exception("UnAuthorized Access", 403);
    }
}
