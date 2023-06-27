<?php

namespace Model\Entities;

use App\Entity;

final class Post
{
    private int $id_post;
    private string $content;
    private $dateCreation;
    private int $member_id;
    private int $topic_id;



    public function getId_post()
    {
        return $this->id_post;
    }


    public function setId_post($id_post)
    {
        $this->id_post = $id_post;
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
        return $this->dateCreation->format('d-m-Y');;
    }


    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

    }


    public function getMember_id()
    {
        return $this->member_id;
    }


    public function setMember_id($member_id)
    {
        $this->member_id = $member_id;
    }


    public function getTopic_id()
    {
        return $this->topic_id;
    }


    public function setTopic_id($topic_id)
    {
        $this->topic_id = $topic_id;
    }
}