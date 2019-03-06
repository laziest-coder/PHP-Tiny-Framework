<?php

namespace Controllers;

use Rakit\Validation\Validator;

class UserController extends BaseController
{

    public function getIndex()
    {
        return $this->blade->make('login_view');
    }

    public function postAuth()
    {
        $validator = new Validator;

        $validation = $validator->make($_POST + $_FILES, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $validation->validate();

        if (!($validation->fails())) {
            $username = $this->request->request->get('username');
            $password = $this->request->request->get('password');
            if ($username == 'admin' && $password == '123') {
                $_SESSION['auth'] = 1;
                header('Location: /');
            }else{
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
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
