<?php

namespace app\controllers\dashboard;

use app\models\Agent;
use app\models\Candidate;
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
        $details = $this->raceDetails($race);
        $this->setLayout('dashboard.main');
        return $this->render([
            'race' => $race,
            'candidates' => $details['candidates'],
            'voteLogs' => $details['voteLogs']
        ], 'dashboard.votes.view');
    }


    public function raceDetails($race)
    {
        $candidates = Candidate::find(['position' => $race]);
        $voteLogs = Vote::find(['race' => $race]);
        foreach ($voteLogs as $vlogs => $vlog) {
            $agent = Agent::findOne(['id' => $vlog['agent']]);
            $voteLogs[$vlogs]['agentName'] = $agent->firstname . ' ' . $agent->lastname;
            $candidate = Candidate::findOne(['id' => $vlog['candidate']]);
            $voteLogs[$vlogs]['candidateName'] = $candidate->firstname . ' ' . $candidate->lastname;
        }
        foreach ($candidates as $cands => $cand)
            $candidates[$cands]['votes'] = $this->countVotes($cand['id']);

        return [
            'candidates' => $candidates,
            'voteLogs' => $voteLogs
        ];
    }

    public function countVotes($candidate)
    {
        $votes = Vote::find(['candidate' => $candidate], ['SUM(votes)']);
        $votes = $votes[0]['SUM(votes)'];
        return $votes;
    }
}
