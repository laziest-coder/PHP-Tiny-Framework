<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

// Require autoload
require_once  __DIR__ . '/../vendor/autoload.php';
// Require database configurations
require_once __DIR__ . '/../config/config.php';

// Doctrine entities path
$entitiesPath = array('Entities');
$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, $dev);
$entityManager = EntityManager::create($dbParams, $config); // doctrine entity manager used to work with database