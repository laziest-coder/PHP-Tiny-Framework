<?php

namespace Controllers;

class UserController extends BaseController
{

    public function getIndex()
    {
        return $this->blade->make('login_view');
    }

    public function postAuth()
    {
        $validator = $this->validator;

        $validation = $validator->make($_POST + $_FILES, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

        $username = $this->request->request->get('username');
        $password = $this->request->request->get('password');
        // $userRepository = $this->em->getRepository('Models\\User');
        // $user = $userRepository->findBy(['username' => $username, 'passwd' => $password]);
        // var_dump($user);die();
        if ($username == 'admin' && $password == '123') {
            $_SESSION['auth'] = 1;
            header('Location: /');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }

    public function getLogout()
    {
        if ($_SESSION['auth'] == 1) {
            session_destroy();
            header('Location: /');
        }
    }
}
