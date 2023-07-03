<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class UserManager extends Manager
{
    protected $className = "Model\Entities\User";
    protected $tableName = "user";

    public function __construct()
    {
        parent::connect();
    }


    public function getUserById($id)
    {
        $sql = "SELECT id_user
                FROM " . $this->tableName . "
                WHERE id_user = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }


    public function findOneByEmail($email){
        $sql = "SELECT *
        FROM ".$this->tableName." a
        WHERE email = :email";

        return $this->getOneorNullResult(
            DAO::select($sql, ['email' => $email],false),
            $this->className);
    }

    
    public function findOneByUser($nickname){
        $sql = "SELECT *
        FROM ".$this->tableName." a
        WHERE nickname = :nickname";

        return $this->getOneorNullResult(
            DAO::select($sql, ['nickname' => $nickname],false),
            $this->className);
    }
}
