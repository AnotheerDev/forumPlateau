<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategoryManager extends Manager
{
    protected $className = "Model\Entities\Category";
    protected $tableName = "category";

    public function __construct()
    {
        parent::connect();
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT id_category, name
                FROM " . $this->tableName . "
                WHERE id_category = :id";

        return $this->getOneOrNullResult(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
