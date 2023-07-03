<?php

namespace Model\Entities;

use App\Entity;
use DateTime;
use Model\Managers\UserManager;


final class User extends Entity
{
    private $id;
    private $nickname;
    private $email;
    private $password;
    private $role;
    private $registerDate;


    public function __construct($data)
    {
        $this->hydrate($data);
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNickname()
    {
        return $this->nickname;
    }


    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role)
    {
        $this->role = $role;
    }


    public function getRegisterDate()
    {
        return $this->registerDate;
    }


    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }


    public function hasRole($role)
    {
        if ($role == $this->role) {
            return true;
        }
        return false;
    }
}
