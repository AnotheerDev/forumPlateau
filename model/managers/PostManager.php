<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager
{
    protected $className = "Model\Entities\Post";
    protected $tableName = "post";

    public function __construct()
    {
        parent::connect();
    }


    public function displayPostsByTopic($id)
    {
        $sql = "SELECT *
                FROM " . $this->tableName . "
                WHERE topic_id = :id
                ORDER BY dateCreation";

        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id], true),
            $this->className
        );
    }
}
