<?php


namespace app\controllers;

use app\models\LoginForm;
use app\models\User;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;
use kilyte\middlewares\AuthMiddleware;
use kilyte\security\StringEncrypt;
use kilyte\security\Token;

class AuthController extends Controller
{

    public function index()
    {
        return $this->render(['KiLyte Framework']);
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->get());
            if ($loginForm->validate() && $loginForm->login()) {
                if (Application::$app->router->isAPI) {
                    $user = Application::$app->user;
                    $encrypt = new StringEncrypt;
                    $identifier = $encrypt->openssl_encrypt("{$user->id}.{$user->firstname}");
                    return ["token" => $this->generateToken(), "identifier" => $identifier];
                }
                $response->redirect('/votes');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render([
            'model' => $loginForm
        ], 'auth.login');
    }

    public function generateToken()
    {
        $token = new Token;
        $token = $token->generathex(64);
        return $token;
    }

    public function register(Request $request, Response $response)
    {
        $registerModel = new User();
        if ($request->isPost()) {
            $registerModel->loadData($request->get());
            if ($registerModel->validate() && $registerModel->save()) {
                $response->redirect('/');
            }
        }
        $this->setLayout('auth');
        return $this->render([
            'model' => $registerModel
        ], 'auth.register');
    }


    public function listAll(Request $request, Response $response)
    {
        $page = $request->getRouteParam('page');

        $user = new User;
        return $this->render(
            ['model' => $user->has(['email' => 'skylarmuthoni@gmail.co'])] //getPage(['id', 'firstname', 'lastname', 'email'], $page)]
        );
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}
