<?php

namespace app\controllers\dashboard;

use app\models\LoginForm;
use app\models\User;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;

class AuthController extends Controller
{

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->get());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/admin');
                return;
            }
        }
        $this->setLayout('dashboard.auth');
        return $this->render([
            'model' => $loginForm
        ], 'dashboard.auth.login');
    }

    public function register(Request $request, Response $response)
    {
        $registerModel = new User();

        if ($request->isPost()) {
            $registerModel->loadData($request->get());
            if ($registerModel->validate() && $registerModel->save()) {
                if (Application::$app->router->isAPI) {
                    return ["response" => "Registration successful"];
                } else {
                    Application::$app->session->setFlash('success', 'Thanks for registering');
                    return $this->login($request, $response);
                }
            }
        }

        $this->setLayout('dashboard.auth');
        return $this->render([
            "model" => $registerModel 
        ], 'dashboard.auth.register');
    }

    public function resetPassword()
    {
        $this->setLayout('dashboard.auth');
        return $this->render([], 'dashboard.auth.reset-password');
    }

    public function forgotPassword()
    {
        $this->setLayout('dashboard.auth');
        return $this->render([], 'dashboard.auth.forgot-password');
    }

    public function confirmEmail()
    {
        $this->setLayout('dashboard.auth');
        return $this->render([], 'dashboard.auth.confirm-email');
    }

    public function logout()
    {
        $this->setLayout('dashboard.auth');
        return $this->render([], 'dashboard.auth.logout');
    }
}
