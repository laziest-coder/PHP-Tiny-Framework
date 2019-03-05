<?php
class IndexController extends IController
{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $fc = $this->fc;
        $task = new Task();
        $tasks = $task->getAllTasks();
        $task->tasks = $tasks;

        $result = $task->render('../views/index.php');

        $fc->setBody($result);
    }

}
