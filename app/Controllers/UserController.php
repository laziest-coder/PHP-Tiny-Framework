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
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = (string) $_POST['username'];
            $password = $_POST['password'];
            $user = new User();
            $result = $user->login($username, $password);
            if ($result->num_rows > 0) {
                $_SESSION['auth'] = 1;
                header('Location: /');
                } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function getLogout()
    {
      if($_SESSION['auth'] == 1){
          session_destroy();
          header('Location: /');
      }
    }
}
