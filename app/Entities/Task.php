<?php
class Task extends Model
{

    public $tableName = 'tasks';

    public $tasks = [];

    public function create($text,$email,$image)
    {
        $text = $this->escape($text);
        $email = $this->escape($email);
        $image = $this->escape($image);
        $sql = "INSERT INTO tasks (`text`, `e-mail`, `image`) VALUES ('$text','$email','$image')";
        return $this->con->query($sql);
    }

    public function getAllTasks()
    {
        $sql = "SELECT * FROM $this->tableName";
        return $this->con->query($sql)->fetch_all();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM tasks where id = $id";
        return $this->con->query($sql);
    }

}
