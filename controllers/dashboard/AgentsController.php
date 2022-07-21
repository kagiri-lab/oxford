<?php

namespace app\controllers\dashboard;

use app\controllers\valiables\LocationsController;
use app\models\Agent;
use app\models\User;
use Exception;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class AgentsController extends Controller
{

    public function registerAgent(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $agentID = $request->getRouteParam('agent');
        $user = User::findOne(['id' => $agentID]);
        $agent = Agent::findOne(['user' => $agentID]);
        if (empty($user)) {
            $response->redirect('/admin/agents/list');
            return;
        }
        $agents = new Agent;
        $agents->user = $agentID;
        if (empty(!$agent)) {
            $agents = null;
        } elseif ($request->isPost()) {
            $agents->loadData($request->get());
            if ($agents->validate() && $agents->save()) {
                $response->redirect('/admin/agents/list');
                return;
            }
        }

        $this->setLayout('dashboard.main');
        return $this->render([
            'model' => $agents
        ], 'dashboard.agents.register');
    }

    public function getAgent(Request $request, Response $response)
    {
        DashboardController::isAdmin();
    }

    public function allAgents(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $agents = Agent::getAll();
        foreach ($agents as $ags => $ag) {
            $county = $ag['county'];
            $constituency = $ag['constituency'];
            $ward = $ag['ward'];
            $agents[$ags]['county'] = LocationsController::returnCountyName($county);
            $agents[$ags]['constituency'] = LocationsController::returnConstituencyName($county, $constituency);
            $agents[$ags]['ward'] = LocationsController::returnWardName($constituency, $ward);
        }
        $this->setLayout('dashboard.main');
        return $this->render([
            'agents' => $agents
        ], 'dashboard.agents.list');
    }

    public function allUsers(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $users = User::getAll(['id', 'email', 'firstname', 'lastname', 'status', 'created_at']);
        foreach ($users as $us => $usv) {
            $users[$us]['agent'] = false;
            $agent = Agent::findOne(['user' => $usv['id']]);
            if ($agent)
                $users[$us]['agent'] = true;
        }
        $this->setLayout('dashboard.main');
        return $this->render(
            ['users' => $users],
            'dashboard.users.list'
        );
    }
}
