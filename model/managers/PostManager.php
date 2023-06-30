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


    public function deletePost($id)
    {
        $sql = "DELETE FROM " . $this->tableName . "
                WHERE id_" . $this->tableName . " = :id";

        DAO::delete($sql, ['id' => $id]);
    }


    // public function updatePost($content, $id)
    // {
    //     $sql = "UPDATE ".$this->tableName."
    //             SET content = :content 
    //             WHERE id_".$this->tableName." = :id";
        
    //     DAO::update($sql, ['content' => $content, 'id' => $id]);
    // }
}
