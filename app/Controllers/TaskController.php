<?php

namespace Controllers;

use Models\Task;
use Intervention\Image\ImageManagerStatic as Image;

class TaskController extends BaseController
{

    public function getCreate()
    {
        return $this->blade->make('task_create');
    }

    public function postCreate()
    {
        $validator = $this->validator;

        $validation = $validator->make($_POST + $_FILES, [
            'email' => 'required|email',
            'username' => 'required',
            'text' => 'required',
            'image' => 'required|uploaded_file:0,2048K,png,jpg,gif',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            // do smth
        } 

        $task = new Task();
        $task->setUsername($this->request->request->get('username'));
        $task->setBody($this->request->request->get('text'));
        $task->setEmail($this->request->request->get('email'));

        $image = $_FILES['image'];

        $img = Image::make($image["tmp_name"])->resize(320, 240);
        $img->save('uploads/'.$image["name"]);
        $task->setImage($image['name']);

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
