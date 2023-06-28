<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class MemberManager extends Manager
{
    protected $className = "Model\Entities\Member";
    protected $tableName = "member";

    public function __construct()
    {
        parent::connect();
    }

    public function getMemberById($id)
    {
        $sql = "SELECT id_member
                FROM " . $this->tableName . "
                WHERE id_member = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
