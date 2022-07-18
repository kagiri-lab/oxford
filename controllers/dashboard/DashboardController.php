<?php

namespace app\controllers\dashboard;

use Exception;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        DashboardController::isAdmin();
        $votesDetails = new VotesController;
        $details = $votesDetails->raceDetails('1');
        $this->setLayout('dashboard.main');
        return $this->render([
            'candidates' => $details['candidates'],
            'voteLogs' => $details['voteLogs']
        ], 'dashboard.votes.president');
    }

    public static function isAdmin()
    {
        $user = Application::$app->user->status;
        if (!$user)
            throw new Exception("UnAuthorized Access", 403);
    }
}
