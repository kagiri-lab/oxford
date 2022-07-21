<?php

namespace app\controllers\dashboard;

use app\controllers\valiables\ColorsController;
use app\controllers\valiables\LocationsController;
use app\controllers\valiables\RaceController;
use app\models\Agent;
use app\models\Candidate;
use app\models\Vote;
use Exception;
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

    public function getPresidential(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $details = $this->presidentialDetails('1');
        $candidates = $details['candidates'];
        $totalVotes = 0;
        foreach ($candidates as $cands => $cand)
            $totalVotes = $totalVotes + $cand['votes'];
        $this->setLayout('dashboard.main');
        return $this->render([
            'race' => '1',
            'candidates' => $candidates,
            'totalVotes' => $totalVotes,
            'voteLogs' => $details['voteLogs']
        ], 'dashboard.votes.race.president');
    }

    public function presidentialDetails($race)
    {
        $candidates = Candidate::find(['position' => $race]);
        $voteLogs = Vote::find(['race' => $race]);
        $color = 0;
        foreach ($voteLogs as $vlogs => $vlog) {
            $agent = Agent::findOne(['id' => $vlog['agent']]);
            $voteLogs[$vlogs]['agentName'] = $agent->firstname . ' ' . $agent->lastname;
            $candidate = Candidate::findOne(['id' => $vlog['candidate']]);
            $voteLogs[$vlogs]['candidateName'] = $candidate->firstname . ' ' . $candidate->lastname;
        }
        foreach ($candidates as $cands => $cand) {
            $candidates[$cands]['color'] = ColorsController::getColor($color);
            $candidates[$cands]['votes'] = $this->countVotes($cand['id']);
            $color++;
        }

        return [
            'candidates' => $candidates,
            'voteLogs' => $voteLogs
        ];
    }

    public function getCounty(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $county = $request->getRouteParam('county');
        $counties = LocationsController::getCounties();
        if (!key_exists($county, $counties)) {
            $response->redirect('/admin/locations/county/0');
            return;
        }
        $governors = Candidate::find(['position' => '2', 'county' => $county]);
        $senetors = Candidate::find(['position' => '3', 'county' => $county]);
        $womenreps = Candidate::find(['position' => '4', 'county' => $county]);
        $constituencies = LocationsController::getConstituenciesByCounty($county);

        $this->setLayout('dashboard.main');
        return $this->render([
            "governors" => $this->setDynamicRows($governors),
            "county" => LocationsController::getCounties()[$county],
            "senetors" => $this->setDynamicRows($senetors),
            "womenreps" => $this->setDynamicRows($womenreps),
            "constituencies" => $constituencies,
            "voteLogs" => []
        ], 'dashboard.votes.race.county');
    }

    public function getDynamicRace(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $race = $request->getRouteParam('race');
        $race = RaceController::getRaceNo($race);
        print_r($race);
        $location = $request->getRouteParam('location');
        $details = $this->raceDetails('1');
        $this->setLayout('dashboard.main');
        return $this->render([
            'race' => '1',
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

    public function getLocation(Request $request)
    {
        $location = $request->getRouteParam('location');
        $list = LocationsController::getCounties();
        $this->setLayout('dashboard.main');
        return $this->render([
            'list' => $list,
            'location' => $location,
        ], 'dashboard.votes.locations');
    }

    public function setDynamicRows($candidates)
    {
        $tvotes = 0;
        $color = 0;
        foreach ($candidates as $cands => $cand) {
            $votes = $this->countVotes($cand['id']);
            $tvotes = $tvotes + $votes;
            $candidates[$cands]['votes'] = $votes;
            $candidates[$cands]['color'] = ColorsController::getColor($color);
            $color++;
        }

        return [
            "canditates" => $candidates,
            "totalVotes" => $tvotes
        ];
    }
}
