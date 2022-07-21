<?php

namespace app\controllers\dashboard;

use app\controllers\valiables\LocationsController;
use app\models\Agent;
use app\models\Candidate;
use app\models\Vote;
use app\routes\Dashboard;
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
        $voteCount = new VotesController;
        $info->votes = $voteCount->countVotes($info->id);
        $totalVotes = 0;
        if ($info->position != "1")
            $competitors = Candidate::find(["position" => $info->position, "county" => $info->county]);
        else
            $competitors = Candidate::find(["position" => $info->position]);
        foreach ($competitors as $comps => $comp) {
            $competitors[$comps]['votes'] = $voteCount->countVotes($comp['id']);
            $totalVotes = $competitors[$comps]['votes'] + $totalVotes;
            if ($comp['id'] == $info->id)
                unset($competitors[$comps]);
        }
        foreach ($competitors as $comps => $comp) {
            $competitors[$comps]['percentage'] = 0;
            if (!empty($totalVotes))
                $competitors[$comps]['percentage'] = number_format((($comp['votes'] / $totalVotes) * 100), 1);
        }
        $info->percentage = 0;
        if ($totalVotes)
            $info->percentage = number_format((($info->votes / $totalVotes) * 100), 1);
        $voteLogs = Vote::find(['candidate' => $info->id]);
        foreach ($voteLogs as $vlogs => $vlog) {
            $agent = Agent::findOne(['id' => $vlog['agent']]);
            $constituency = LocationsController::getConstituenciesByCounty($agent->county)[$agent->constituency];
            $agent->ward = LocationsController::getWardsByConstituency($agent->constituency)[$agent->ward];
            $agent->constituency = $constituency;
            $voteLogs[$vlogs]['agent'] = $agent;
        }
        $this->setLayout('dashboard.main');
        return $this->render([
            "candidate" => $info,
            "competitors" => $competitors,
            "voteLogs" => $voteLogs
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
