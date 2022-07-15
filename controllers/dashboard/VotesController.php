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
        $race = $request->getRouteParam('race');
        $vote = Vote::findOne(['race' => $race]);
        $voteLogs = Vote::find(['race' => $race]);
        $this->setLayout('dashboard.main');
        return $this->render([
            'votes' => $vote,
            'voteLogs' => $voteLogs
        ], 'dashboard.votes.view');
    }
}
