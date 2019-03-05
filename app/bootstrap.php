<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Require autoload
require_once __DIR__ . '/../vendor/autoload.php';
// Require database configurations
require_once __DIR__ . '/../config/config.php';
/* Routes file */
require_once __DIR__ . '/../routes/routes.php';

/* Doctrine ORM Part Start */
$entitiesPath = array(__DIR__. '/Models');

$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
/* Doctrine ORM Part End */



