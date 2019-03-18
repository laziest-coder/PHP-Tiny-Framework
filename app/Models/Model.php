<?php

namespace Models;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Model
{

    public static function getEntityManager()
    {
        define('BASE_DIR', dirname(__DIR__));
        require BASE_DIR . '/../config/config.php';
        $entitiesPath = array(__DIR__ . '/');
        $config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);
        return $entityManager;
    }

}
