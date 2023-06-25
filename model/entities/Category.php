<?php

namespace Model\Entities;

use App\Entity;

final class Category extends Entity
{
    private int $id_category;
    private string $name;

    public function __construct($data)
    {
        $this->hydrate($data);
    }


    public function getId_category()
    {
        return $this->id_category;
    }


    public function setId_category($id_category)
    {
        $this->id_category = $id_category;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }
}