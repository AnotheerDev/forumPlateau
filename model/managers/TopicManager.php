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

        $sql = "SELECT id_topic, title, dateCreation, locked, member_id, category_id
                    FROM " . $this->tableName . " t
                    LEFT JOIN post p ON p.topic_id = t.id_" . $this->tableName . "
                    WHERE t.category_id = :id
                    GROUP BY t.id_" . $this->tableName . "
                    ORDER BY t.publishDate DESC";


        return $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]),
            $this->className
        );
    }
}
