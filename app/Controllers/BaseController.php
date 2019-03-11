<?php

namespace Controllers;

use Jenssegers\Blade\Blade;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

abstract class BaseController {

    protected $em;

    protected $blade;

    protected $request;

    public function __construct()
    {
        // Require database configurations
        require_once __DIR__ . '/../../config/config.php';
        /* Doctrine ORM Part Start */
        $entitiesPath = array(__DIR__. '/../Models');
        $config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);
        /* Doctrine ORM Part End */

        // Create Symfony Request object
        $request = Request::createFromGlobals();

        $this->request = $request;
        $this->em = $entityManager;
        $this->blade = new Blade('views', 'cache');
    }

}