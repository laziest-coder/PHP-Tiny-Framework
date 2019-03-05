<?php
set_include_path(get_include_path()
					.PATH_SEPARATOR.'app/controllers'
					.PATH_SEPARATOR.'app/models'
					.PATH_SEPARATOR.'app/views');

function __autoload($class){
  require_once($class.'.php');
}

require_once('vendor/autoload.php');

$front = FrontController::getInstance();
$front->route();
echo $front->getBody();