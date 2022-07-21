<?php

namespace app\controllers\dashboard;

use app\models\Agent;
use app\models\User;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class AgentsController extends Controller
{

    public function registerAgent(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $agents = new Agent;
        if ($request->isPost()) {
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
        $this->setLayout('dashboard.main');
        return $this->render([
            'agents' => $agents
        ], 'dashboard.agents.list');
    }

    public function allUsers(Request $request, Response $response)
    {
        DashboardController::isAdmin();
        $users = User::getAll(['id', 'email', 'firstname', 'lastname', 'status', 'created_at']);
        $this->setLayout('dashboard.main');
        return $this->render(
            ['users' => $users],
            'dashboard.users.list'
        );
    }
}
