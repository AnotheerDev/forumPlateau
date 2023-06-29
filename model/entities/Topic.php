<?php

namespace Model\Entities;

use App\Entity;
use DateTime;

final class Topic extends Entity
{

        private $id;
        private $title;
        private $dateCreation;
        private $locked;
        private $member;
        private $category;

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


        public function getMember()
        {
                return $this->member;
        }


        public function setMember($member)
        {
                $this->member = $member;
        }


        public function getCategory()
        {
                return $this->category;
        }


        public function setCategory($category)
        {
                $this->category = $category;
        }
}
