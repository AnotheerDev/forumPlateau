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
}
