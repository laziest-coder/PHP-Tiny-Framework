<?php

namespace Controllers;

class IndexController 
{
    
    // public function __construct()
    // {
    //     parent::__construct();
    // }

    public function indexAction()
    {
        $fc = $this->fc;
        $task = new Task();
        $tasks = $task->getAllTasks();
        $task->tasks = $tasks;

        $result = $task->render('../views/index.php');

        $fc->setBody($result);
    }

    public function getTest()
    {
        return "Yes inside idnex controller :D";
    }

}
