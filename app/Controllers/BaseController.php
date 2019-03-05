<?php

namespace Controllers;

abstract class BaseController {

    protected $em;

    public function __construct()
    {
        global $entityManager;
        $this->em = $entityManager;
    }

}