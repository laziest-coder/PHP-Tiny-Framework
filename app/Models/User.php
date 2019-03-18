<?php

namespace Models;

/**
 * @Entity @Table(name="users")
 **/

class User
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $passwd;

    /** @Column(type="string") **/
    protected $username;

    public function getId()
    {
        return $this->id;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function setPasswd($passwd)
    {   
        $this->passwd = $passwd;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {   
        $this->username = $username;
    }

}