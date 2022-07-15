<?php

namespace app\controllers\site;

use app\controllers\valiables\PositionsController;
use app\models\Agent;
use app\models\Candidate;
use app\models\Member;
use app\models\Vote;
use Exception;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class VotesController extends Controller
{

    public function index()
    {
        $this->setLayout('site.user');
        return $this->render([
            'votes' => ''
        ], 'user.votes.index');
    }

    public function candidates(Request $request, Response $response)
    {
        $position = $request->getRouteParam('position');
        if (empty($position) || $position > 6) {
            $response->redirect('/votes');
            return;
        }
        $candidates = Candidate::find(['position' => $position]);
        $cagent = Application::$app->user->id;
        $agent = Agent::findOne(['user' => $cagent]);
        if (!$agent)
            throw new Exception("UnAuthorized", 403);

        foreach ($candidates as $candidate => $val) {


            $cand = Candidate::findOne(['id' => $val['id']]);
            $canvote = $this->validateAgent($cand, $agent);
            $hasvoted = false;
            if ($canvote)
                $hasvoted = Vote::findOne(['agent' => $cagent, 'candidate' => $val['id']]);
            if ($canvote == true && $hasvoted == false) {
                $votes = Vote::find(['candidate' => $val['id']], ['SUM(votes)']);
                $votes = $votes[0]['SUM(votes)'];
                $val['votes'] = $votes;
                $candidates[$candidate]['votes'] = $votes;
            }
            $candidates[$candidate]['canvote'] = ($canvote == true && $hasvoted == false);
        }

        $this->setLayout('site.user');
        return $this->render([
            'candidates' => $candidates,
            'position' => PositionsController::positions()[$position],
        ], 'user.votes.candidates');
    }

    public function candidate(Request $request, Response $response)
    {
        $position = $request->getRouteParam('position');
        $candidateNo = $request->getRouteParam('candidate');
        if (empty($position) || $position > 6 || empty($candidateNo)) {
            $response->redirect('/votes');
            return;
        }
        $candidate = Candidate::findOne(['id' => $candidateNo]);
        if (empty($candidate))
            throw new Exception("UnAuthorized Voting", 403);

        $vote = new Vote;
        $vote->agent = Application::$app->user->id;
        $agent = Agent::findOne(['user' => $vote->agent]);
        if (!$agent)
            throw new Exception("UnAuthorized Voting", 403);
        if ($request->isGet()) {
            $canvote = $this->validateAgent($candidate, $agent);
            if (!$canvote)
                throw new Exception("UnAuthorized", 403);
        }

        if ($request->isPost()) {
            $vote->loadData($request->get());
            $vote->candidate = $candidate->id;
            $vote->race = $candidate->position;

            if ($agent) {
                $vote->station = $agent->station;
                $hasVotes = Vote::findOne(['agent' => $vote->agent, 'station' => $vote->station, 'candidate' => $vote->candidate]);
                if (!$hasVotes) {
                    if ($this->validateAgent($candidate, $agent)) {
                        if ($vote->validate() && $vote->save()) {
                            $response->redirect('/votes/candidates/' . $position);
                            return;
                        }
                    } else
                        throw new Exception("UnAuthorized Voting", 403);
                } else
                    throw new Exception("UnAuthorized Voting", 403);
            } else
                throw new Exception("UnAuthorized Voting", 403);
        }

        $this->setLayout('site.user');
        return $this->render([
            'candidate' => $candidate,
            'position' => PositionsController::positions()[$position],
            'model' => $vote
        ], 'user.votes.submit');
    }

    public function validateAgent($candidate, $agent)
    {
        if ($candidate->position != 1) {
            if ($candidate->county == $agent->county) {
                if ($candidate->position <= 4)
                    return true;
                else {
                    if ($candidate->constituency == $agent->constituency) {
                        if ($candidate <= 5)
                            return true;
                        else {
                            if ($candidate->ward == $agent->ward)
                                return true;
                            else
                                return false;
                        }
                    } else
                        return false;
                }
            } else
                return false;
        } else
            return true;
    }
}
