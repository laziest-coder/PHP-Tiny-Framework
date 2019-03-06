<?php

namespace Controllers;

use Jenssegers\Blade\Blade;

abstract class BaseController {

    protected $em;

    protected $blade;

    protected $request;

    public function __construct()
    {
        global $entityManager;
        global $request;
        $this->request = $request;
        $this->em = $entityManager;
        $this->blade = new Blade('views', 'cache');
    }

}