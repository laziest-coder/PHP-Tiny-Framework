<?php

namespace Controllers;
use Jenssegers\Blade\Blade;

abstract class BaseController {

    protected $em;

    protected $blade;

    public function __construct()
    {
        global $entityManager;
        $this->em = $entityManager;
        $this->blade = new Blade('views', 'cache');
    }

}