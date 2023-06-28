<?php

namespace Model\Entities;

use App\Entity;
use DateTime;

final class Member extends Entity
{
    private int $id;
    private string $nickname;
    private string $email;
    private string $password;
    private string $role;
    private string $registerDate;


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
}
