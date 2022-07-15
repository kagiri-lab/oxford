<?php

namespace app\controllers\dashboard;

use app\models\Vote;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class VotesController extends Controller
{

    public function getRace(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $vote = Vote::findOne(['race' => '1']);
        $this->setLayout('dashboard.main');
        return $this->render([
            'votes' => $vote 
        ], 'dashboard.votes.view');
    }
}
