<?php

namespace Models;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Model
{

    protected $em;

    public function __construct()
    {
        require __DIR__ . '/../../config/config.php';
        /* Doctrine ORM Part Start */
        $entitiesPath = array(__DIR__ . '/');
        $config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);
        /* Doctrine ORM Part End */
        $this->setEm($entityManager);
    }

    public function getEm()
    {
        return $this->em;
    }

    public function setEm($em)
    {
        $this->em = $em;
    }

}
