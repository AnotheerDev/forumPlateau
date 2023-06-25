<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategoryManager extends Manager
{
    private $className = "Model\Entities\Category";
    private $tableName = "Category";

    public function __construct()
    {
        parent::connect();
    }
}