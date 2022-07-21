<?php

namespace app\controllers\dashboard;

use app\controllers\valiables\ColorsController;
use app\controllers\valiables\LocationsController;
use app\controllers\valiables\RaceController;
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
        $governors = Candidate::find(['position' => '2', 'county' => $county]);
        $senetors = Candidate::find(['position' => '3', 'county' => $county]);
        $womenrep = Candidate::find(['position' => '2', 'county' => $county]);
        $constituencies = LocationsController::getConstituenciesByCounty($county);
        $color = 0;
        $totalVotes = 0;
        foreach ($governors as $govs => $gov) {
            $votes = $this->countVotes($gov['id']);
            $totalVotes = $totalVotes + $votes;
            $governors[$govs]['votes'] = $votes;
            $governors[$govs]['color'] = ColorsController::getColor($color);
            $color++;
        }


        $this->setLayout('dashboard.main');
        return $this->render([
            "race" => "2",
            "candidates" => $governors,
            "county" => LocationsController::getCounties()[$county],
            "senetors" => $senetors,
            "womenrep" => $womenrep,
            "constituencies" => $constituencies,
            "totalVotes" => $totalVotes,
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
        $id = $request->getRouteParam('id');
        $list = [];
        switch ($location) {
            case "county":
                $list = LocationsController::getCounties();
                break;
            case "constituency":
                $list = LocationsController::getConstituenciesByCounty($id);
                break;
            case "ward":
                $list = LocationsController::getWardsByConstituency($id);
                break;
            default:
                break;
        }
        $this->setLayout('dashboard.main');
        return $this->render([
            'list' => $list,
            'location' => $location,
        ], 'dashboard.votes.locations');
    }
}
