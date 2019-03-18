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

        $validation = $validator->make($this->request->request + $this->request->files, [
            'email' => 'required|email',
            'username' => 'required',
            'text' => 'required',
            'image' => 'required|uploaded_file:0,2048K,png,jpg,gif',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $this->redirect($this->request->server->get('HTTP_REFERER'));
        } 

        $task = new Task();
        $task->setUsername($this->request->request->get('username'));
        $task->setBody($this->request->request->get('text'));
        $task->setEmail($this->request->request->get('email'));

        $image = $this->request->files->get('image');        

        $img = Image::make($image->getPathName())->resize(320, 240);
        $img->save('uploads/'.$image->getClientOriginalName());
        $task->setImage($image->getClientOriginalName());

        $this->em->persist($task);
        $this->em->flush();

        $this->redirect('/task/create');
    }

    public function getDelete($id)
    {
        $taskRepository = $this->em->getRepository('Models\\Task');
        $task = $taskRepository->find($id);
        $this->em->remove($task);
        $this->em->flush();
        $this->redirect('/');
    }

}
