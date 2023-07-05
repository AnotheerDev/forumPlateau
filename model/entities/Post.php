<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity
{
    private int $id;
    private string $content;
    private $dateCreation;
    private $user;
    private $topic;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function setContent($content)
    {
        $this->content = $content;
    }


    public function getDateCreation()
    {
        $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
        return $formattedDate;
    }


    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = new \DateTime($dateCreation);
        return $this;
    }


    public function getUser()
    {
        return $this->user;
    }


    public function setUser($user)
    {
        $this->user = $user;
    }


    public function getTopic()
    {
        return $this->topic;
    }


    public function setTopic($topic)
    {
        $this->topic = $topic;
    }
}
