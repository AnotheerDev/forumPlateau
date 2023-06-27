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
}