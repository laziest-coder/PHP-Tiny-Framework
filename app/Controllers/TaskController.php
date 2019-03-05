<?php

namespace Controllers;

class TaskController extends BaseController
{

    public function createAction()
    {
        $fc = $this->fc;
        $task = new User();
        $result = $task->render('../views/task_create_view.php');
        $fc->setBody($result);
    }

    public function getCheck()
    {
        $task = new \Models\Task();
        // $task->setUsername("Jasurbek");
        // $task->setBody("I wan these the das");
        // $task->setEmail("jack@mail.ru");
        // $task->setImage("sfds.jpg");

        // $this->em->persist($task);
        // $this->em->flush();
        // $productRepository = $this->em->getRepository('Models\\Task');
        // $tasks = $productRepository->findAll();

        // foreach($tasks as $task){
        //     echo $task->getUsername()."<br>";
        // }
        return $this->blade->make('index', ['name' => 'John Doe']);
        
    }

    public function pushAction()
    {
        if (isset($_POST['e-mail']) && isset($_POST['text']) && isset($_FILES['image'])) {
            $mail = $_POST['e-mail'];
            $text = $_POST['text'];
            $image = $_FILES['image'];
            $img_size = getimagesize($image['tmp_name']);
            if ($img_size[0] > 320 && $img_size[1] > 240) {
                try {
                    $manipulator = new ImageManipulator($image['tmp_name']);
                    $newImage = $manipulator->resample(320, 240);
                    $newNamePrefix = time() . '_' . $image['name'];
                    try {
                        $manipulator->save('uploads/' . $newNamePrefix);
                    } catch (Exception $a) {
                        echo $a->getMessage();
                    }
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
            $task = new Task();
            $result = $task->create($text,$mail,$newNamePrefix);
            if ($result === true) {
                header('Location: /');
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    public function deleteAction()
    {
        $fc = $this->fc;
        $params = $fc->getParams();
        // print_r($params['id']);die();
        $task = new Task();
        $result = $task->delete($params['id']);
        if($result){
            header('Location: /');
        }
    }

}
