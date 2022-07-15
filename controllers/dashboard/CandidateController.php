<?php

namespace app\controllers\dashboard;

use app\models\Candidate;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class CandidateController extends Controller
{

    public function registerCandidate(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $candidate = new Candidate;
        if ($request->isPost()) {
            $candidate->loadData($request->get());
            if ($candidate->validate() && $candidate->save()) {
                $response->redirect('/admin/candidates/list');
                return;
            }
        }
        $this->setLayout('dashboard.main');
        return $this->render([
            'model' => $candidate
        ], 'dashboard.candidates.register');
    }

    public function get(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $candidate = $request->getRouteParam('candidate');
        if (empty($candidate)) {
            $response->redirect('/admin/candidates/list');
            return;
        }
        $info = Candidate::findOne(["id" => $candidate]);
        if (empty($info)) {
            $response->redirect('/admin/candidates/list');
            return;
        }
        $this->setLayout('dashboard.main');
        return $this->render([
            "candidate" => $info
        ], 'dashboard.candidates.view');
    }

    public function getall()
    {
        DashboardController::isAdmin();
        $candidates = Candidate::getAll();
        $this->setLayout('dashboard.main');
        return $this->render([
            'candidates' => $candidates
        ], 'dashboard.candidates.list');
    }
}
