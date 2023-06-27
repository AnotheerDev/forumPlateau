<?php

namespace Model\Entities;

use App\Entity;
use DateTime;

final class Topic extends Entity
{

        private int $id_topic;
        private string $title;
        private DateTime $dateCreation;
        private int $locked;
        private int $member_id;
        private int $category_id;

        public function __construct($data)
        {
                $this->hydrate($data);
        }


        public function getId()
        {
                return $this->id_topic;
        }


        public function setId($id_topic)
        {
                $this->id_topic = $id_topic;
        }


        public function getTitle()
        {
                return $this->title;
        }


        public function setTitle($title)
        {
                $this->title = $title;
        }


        public function getdateCreation()
        {
                $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        public function setdateCreation($date)
        {
                $this->dateCreation = new \DateTime($date);
                return $this;
        }


        public function getlocked()
        {
                return $this->locked;
        }


        public function setlocked($locked)
        {
                $this->locked = $locked;
        }


        public function getMember_id()
        {
                return $this->member_id;
        }


        public function setMember_id($member_id)
        {
                $this->member_id = $member_id;
        }


        public function getCategory_id()
        {
                return $this->category_id;
        }


        public function setCategory_id($category_id)
        {
                $this->category_id = $category_id;
        }
}
