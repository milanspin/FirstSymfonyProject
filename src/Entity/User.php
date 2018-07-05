<?php
namespace App\Entity;

class User {
    protected $name;
    protected $password;
    protected $mail;

    public function getName()
    {
        return $this->name;
    }

    public function setName()
    {
        $this->name = $name;
    }

    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword()
    {
        $this->password = $password;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail()
    {
        $this->mail = $mail;
    }
}