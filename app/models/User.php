<?php
class User extends Model
{
    public $tableName = 'users';

    public function login($username,$password)
    {
        $con = $this->con;
        $sql = "SELECT id FROM $this->tableName WHERE username='$username' AND passwd='$password'";
        $result = $con->query($sql);
        return $result;
    }

}
