<?php

class UserController extends IController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function loginAction()
    {
        $fc = $this->fc;
        $user = new User();
        $result = $user->render('../views/login_view.php');

        $fc->setBody($result);
    }

    public function authAction()
    {
        $fc = $this->fc;
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

    public function logoutAction()
    {
      if($_SESSION['auth'] == 1){
          session_destroy();
          header('Location: /');
      }
    }
}
