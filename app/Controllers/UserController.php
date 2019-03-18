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

        $validation = $validator->make($this->request->request + $this->request->files, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $this->redirect($this->request->server->get('HTTP_REFERER'));
        }

        $username = $this->request->request->get('username');
        $password = $this->request->request->get('password');
        $userRepository = $this->em->getRepository('Models\\User');
        $user = $userRepository->findBy(['username' => $username, 'passwd' => $password]);
        
        if($user[0] != NULL){
            $this->session->set('auth',1);
            $this->redirect('/');
        } else {
            $this->redirect($this->request->server->get('HTTP_REFERER'));
        }

    }

    public function getLogout()
    {
        if ($this->session->get('auth') == 1) {
            session_destroy();
            $this->redirect('/');
        }
    }
}
