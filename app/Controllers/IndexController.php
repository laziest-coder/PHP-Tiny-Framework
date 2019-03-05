<?php

namespace Controllers;

class IndexController extends BaseController
{
    
    public function getIndex()
    {
        $task = new \Models\Task();
        
        $taskRepository = $this->em->getRepository('Models\\Task');
        $tasks = $taskRepository->findAll();
        return $this->blade->make('index',['tasks' => $tasks]);
    }

}
