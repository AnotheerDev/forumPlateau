<?php

namespace Model\Entities;

use App\Entity;
use DateTime;

final class Member extends Entity
{
    private int $id_member;
    private string $nickname;
    private string $email;
    private string $password;
    private string $role;
    private DateTime $registerDate;


    public function __construct($data)
    {
        $this->hydrate($data);
    }


    public function getId_member()
    {
        return $this->id_member;
    }


    public function setId_member($id_member)
    {
        $this->id_member = $id_member;
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
        return $this->registerDate->format('d-m-Y');
    }


    // public function setRegisterDate($registerDate)
    // {
    //     $this->registerDate = $registerDate;
    // }
}