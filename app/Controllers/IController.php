<?php
class IController {

    public $fc;

    public function __construct()
    {
        session_start();
        $this->fc = FrontController::getInstance();
    }

}