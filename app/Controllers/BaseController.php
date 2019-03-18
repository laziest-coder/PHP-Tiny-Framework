<?php

namespace Controllers;

use Jenssegers\Blade\Blade;
use Rakit\Validation\Validator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Models\Model;

abstract class BaseController
{
    protected $em;

    protected $blade;

    protected $request;

    protected $validator;

    protected $redirect;

    protected $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->session->start();
        $this->request = Request::createFromGlobals();
        $this->em = Model::getEntityManager();
        $this->blade = new Blade('views', 'views/cache');
        $this->validator = new Validator;
    }

    public function redirect($url)
    {
        $redirect = new RedirectResponse($url);
        $this->redirect = $redirect;
        $this->redirect->send();
    }

}
