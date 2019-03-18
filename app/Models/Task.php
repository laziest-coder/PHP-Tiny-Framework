<?php

namespace Models;

/**
 * @Entity @Table(name="tasks")
 **/

class Task
{
    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @Column(type="string") **/
    protected $body;

    /** @Column(type="string") **/
    protected $email;

    /** @Column(type="string") **/
    protected $image;

    /** @Column(type="string") **/
    protected $username;

    public function getId()
    {
        return $this->id;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {   
        $this->body = $body;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {   
        $this->email = $email;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {   
        $this->image = $image;
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