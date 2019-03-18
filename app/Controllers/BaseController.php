<?php

namespace Controllers;

use Jenssegers\Blade\Blade;
use Rakit\Validation\Validator;
use Symfony\Component\HttpFoundation\Request;

abstract class BaseController
{
    protected $em;

    protected $blade;

    protected $request;

    protected $validator;

    public function __construct()
    {
        // Create Symfony Request object
        $this->request = Request::createFromGlobals();
        $model = new \Models\Model();
        $this->em = $model->getEm();
        $this->blade = new Blade('views', 'views/cache');
        $this->validator = new Validator;
    }

}
