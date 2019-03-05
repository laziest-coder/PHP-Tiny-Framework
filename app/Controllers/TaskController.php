<?php

namespace Controllers;
use Intervention\Image\ImageManagerStatic as Image;

class TaskController extends BaseController
{

    public function getCreate()
    {
        return $this->blade->make('task_create');
    }

    public function getCheck()
    {

        // foreach($tasks as $task){
        //     echo $task->getUsername()."<br>";
        // }
        return $this->blade->make('index', ['name' => 'John Doe']);
        
    }

    public function postCreate()
    {
        $task = new \Models\Task();

        $mail = $_POST['e-mail'];
        $text = $_POST['text'];
        $image = $_FILES['image'];
        $username = $_POST['username'];

        // $img = Image::make("uploads/".$image["name"]."")->resize(300, 200);

        // $img->save('uploads/'.$image["tmp_name"]);

        $task->setUsername($username);
        $task->setBody($text);
        $task->setEmail($mail);
        $task->setImage("sfds.jpg");

        $this->em->persist($task);
        $this->em->flush();
        
        header('Location: /task/create');
    }

    public function getDelete($id)
    {
        $taskRepository = $this->em->getRepository('Models\\Task');
        $task = $taskRepository->find($id);
        $this->em->remove($task);
        $this->em->flush();
        header('Location: /');
    }

}
