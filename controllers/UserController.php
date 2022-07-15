<?php

namespace app\controllers;

use app\models\User;
use kilyte\Application;
use kilyte\Controller;
use kilyte\Http\Request;
use kilyte\http\Response;
use kilyte\middlewares\AuthMiddleware;

class UserController extends Controller
{

    public function userIndex()
    {
        $this->setLayout('site.user');
        return $this->render(
            ['model' => ''],
            'user.home'
        );
    }

    public function profile(Request $request)
    {
        $user = Application::$app->user;
        $this->setLayout('site.user');
        return $this->render(
            ['model' => $user],
            'user.profile.summary'
        );
    }

    public function all_users(Request $request)
    {
        $this->setLayout('site.user');
        $user = User::getAll(['id', 'firstname', 'lastname', 'email', 'status', 'created_at']);
        return $this->render(
            ['model' => $user],
            'user.profile.users'
        );
    }

    public function edit(Request $request, Response $response)
    {
        $id = $request->getRouteParam('id');
        $this->setLayout('site.user');
        if ($request->isPost()) {
            print_r($request->get());
            $user = new User;
            if ($user->update($request->get(), ['id' => $id])) {
                $response->redirect('../all');
                return;
            }
        }
        $user = User::findOne(['id' => $id]);
        return $this->render(
            ['model' => $user],
            'user.profile.user_edit'
        );
    }


    public function profileWithId(Request $request)
    {
        echo '<pre>';
        var_dump($request->getRouteParams());
        echo '</pre>';
    }
}
