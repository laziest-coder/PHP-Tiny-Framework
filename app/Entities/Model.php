<?php

abstract class Model {

    public $con;

    public function __construct() {
        $this->con = new mysqli("localhost","root","mysql","express");
    }

    public function render($file)
    {
        ob_start();
        include dirname(__FILE__) . '/' . $file;
        return ob_get_clean();
    }

    public function escape($str)
    {
        return $this->con->real_escape_string($str);
    }
}