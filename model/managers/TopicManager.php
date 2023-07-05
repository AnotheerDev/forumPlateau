<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class TopicManager extends Manager
{

    protected $className = "Model\Entities\Topic";
    protected $tableName = "topic";


    public function __construct()
    {
        parent::connect();
    }

    public function fetchTopicsByCat($id)
    {

        $sql = "SELECT id_topic, title, t.dateCreation, locked, t.user_id, category_id
                    FROM " . $this->tableName . " t
                    LEFT JOIN post p ON p.topic_id = t.id_" . $this->tableName . "
                    WHERE t.category_id = :id
                    GROUP BY t.id_" . $this->tableName . "
                    ORDER BY t.dateCreation DESC";


        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }


    public function deleteTopic($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "
                WHERE id_" . $this->tableName . " = :id";

        DAO::delete($sql, ['id' => $id]);
    }


    public function lockTopic($id)
    {
        $sql = "UPDATE " . $this->tableName . " t
                SET t.locked = 1 
                WHERE t.id_" . $this->tableName . " = :id";
        return DAO::update($sql, ['id' => $id]);
    }


    public function unlockTopic($id)
    {
        $sql = "UPDATE " . $this->tableName . " t
                SET t.locked = 0 
                WHERE t.id_" . $this->tableName . " = :id";
        return DAO::update($sql, ['id' => $id]);
    }
}
